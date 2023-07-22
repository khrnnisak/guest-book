<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\Tamu;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('user.create', compact('pegawais'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'instansi' => 'required',
            'jadwal_temu' => 'required',
            'pegawai_id' => 'required|exists:pegawai,id',
            'keperluan' => 'required',
        ]);            
        $jadwal = new Tamu;

        $user = Auth::user()->id;
        $jadwal->user_id = $user;
        $jadwal->nama_lengkap = $request->input('nama_lengkap');
        $jadwal->instansi = $request->input('instansi');
        $jadwal->jadwal_temu = $request->input('jadwal_temu');
        $jadwal->pegawai_id = $request->input('pegawai_id');
        $jadwal->keperluan = $request->input('keperluan');
        
        $jadwal->save();
        
        return redirect()->route('tamu.show')->with('success', 'Jadwal berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {   
        
        $user = Auth::user();
        $acc = $user->role=='admin';
        if($user->role == 'admin'){
            $paginate = Tamu::orderBy('jadwal_temu', 'asc')->paginate(5);
            $jadwal = Tamu::join('pegawai', 'pegawai.id', '=', 'jadwal.pegawai_id')
                ->get(['jadwal.*', 'pegawai.nama']);
    
            return view('admin.showTamu', compact('jadwal', 'paginate'));
        }else{
            $id = Auth::user()->id;
            $paginate = Tamu::orderBy('jadwal_temu', 'asc')->paginate(5);
            $jadwal = Tamu::join('pegawai', 'pegawai.id', '=', 'jadwal.pegawai_id')
                ->get(['jadwal.*', 'pegawai.nama'])
                ->where('user_id', $id);
    
            return view('user.riwayat', compact('jadwal', 'paginate'));
        }       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tamu = DB::table('jadwal')->where('id', $id)->first();
        
        $pegawais =  Tamu::all();
        return view('user.update', compact( 'pegawais', 'tamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'jadwal_temu' => 'required',
        ]);            
        $jadwal = Tamu::find($id);
        $user = Auth::user()->id;
        $jadwal->user_id = $user;
        $jadwal->jadwal_temu = $request->input('jadwal_temu');
        
        $jadwal->save();
        
        return redirect()->route('tamu.show')->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function setCancel(Request $request, $id)
    {
        $jadwal = Tamu::find($id);
        $jadwal->status = 'Batal';
        $jadwal->save();

        $user = Auth::user();
        if($user->role == 'admin'){
            return redirect()->route('tamu')
            ->with('success', 'Kamu menunggu kunjungan anda!');
        }else{
            return redirect()->route('tamu.show')
            ->with('success', 'Kamu menunggu kunjungan anda!');
        }
    }
    public function setConfirm($id){
        
        $jadwal = Tamu::find($id);
        $jadwal->status = 'Sudah';
        $jadwal->save();
        
        
        $user = Auth::user();
        if($user->role == 'admin'){
            return redirect()->route('tamu')
            ->with('success', 'Kamu menunggu kunjungan anda!');
        }else{
            return redirect()->route('tamu.show')
            ->with('success', 'Kamu menunggu kunjungan anda!');
        }
    } 
    public function showDetail($id)
    {
        // $tamu = Tamu::find($id); 
        $tamu = Tamu::select('jadwal.*', 'pegawai.nama')
        ->join('pegawai', 'pegawai.id', '=', 'jadwal.user_id')
        ->where('jadwal.id','=',$id)
        ->first();
        return view('tamu.show', compact('tamu'));
    }
}
