<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\Tamu;
use Carbon\Carbon;


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
        return view('user.home');
    }
    public function admin(){
        
        // $tanggalSekarang = Carbon::now()->format('Y-m-d');
        $today = Tamu::whereDate('jadwal_temu', Carbon::now()->format('Y-m-d'))->count();
        $belum = Tamu::where('status', 'Belum')->count();
        $sudah = Tamu::where('status', 'Sudah')->count();
        $batal = Tamu::where('status', 'Batal')->count();
            return view('admin.home', compact('today','belum', 'sudah', 'batal'));
            // return ;
        return view('admin.home');
    }
    
}
