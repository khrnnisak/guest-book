<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;
        $today = Tamu::whereDate('jadwal_temu', Carbon::now()->format('Y-m-d'))->where('user_id', $user)->count();
        $total = Tamu::where('user_id', $user)->count();
        return view('user.home', compact('today', 'total'));
    }
    public function admin(){
        
        // $tanggalSekarang = Carbon::now()->format('Y-m-d');
        $today = Tamu::whereDate('jadwal_temu', Carbon::now()->format('Y-m-d'))->count();
        $belum = Tamu::where('status', 'Belum')->count();
        $sudah = Tamu::where('status', 'Sudah')->count();
        $batal = Tamu::where('status', 'Batal')->count();
        $paginate = Tamu::orderBy('jadwal_temu', 'asc')->paginate(5);
            $jadwal = Tamu::join('pegawai', 'pegawai.id', '=', 'jadwal.pegawai_id')
                ->whereDate('jadwal_temu', Carbon::now()->format('Y-m-d'))
                ->get(['jadwal.*', 'pegawai.nama']);
            return view('admin.home', compact('jadwal', 'paginate','today','belum', 'sudah', 'batal'));
    }
    
}
