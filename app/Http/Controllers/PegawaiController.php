<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Bidang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pegawai.get');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs =  Bidang::all();
        return view('admin.pegawai.create', compact('bidangs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ]);  
        $pegawai = new Pegawai;
        $pegawai->nama = $request->get('nama');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->bidang_id = $request->get('bidang_id');
        
        $pegawai->save();
        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil ditambahkan');


// ...

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $paginate = Pegawai::orderBy('id', 'asc')->paginate(5);
        $pegawai = Pegawai::join('bidang', 'bidang.id', '=', 'pegawai.bidang_id')
            ->get(['pegawai.*', 'bidang.name']);

        return view('admin.pegawai.get', compact('pegawai', 'paginate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $peg = DB::table('pegawai')->where('id', $id)->first();
        
        $bidangs =  Bidang::all();
        return view('admin.pegawai.update', compact( 'bidangs', 'peg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ]);  
        $pegawai = Pegawai::find($id);
        $pegawai->nama = $request->get('nama');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->bidang_id = $request->get('bidang_id');
        
        $pegawai->save();
        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        
        if($pegawai != null){
            $pegawai->delete();
            return redirect()->route('pegawai')
                ->with('success', 'Pegawai Berhasil Dihapus');
        }
    }
}
