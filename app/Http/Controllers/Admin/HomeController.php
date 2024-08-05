<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Jadwal;
use App\Models\Keuangan;
use App\Models\Pelayanan;
use App\Models\Peralatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->role ?? 'user';

        $anggota = Anggota::count();
        $jadwal = Jadwal::count();
        $user = User::where('role','user')->count();
        $pelayanan = Pelayanan::with('user')->when($auth == 'user', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
        $total_masuk = Keuangan::where('type', 'masuk')->sum('nominal');
        $total_keluar = Keuangan::where('type', 'keluar')->sum('nominal');
        $total_keseluruhan =  $total_masuk - $total_keluar;

        return view('pages.home', compact(
            'anggota',
            'jadwal',
            'user',
            'pelayanan',
            'total_masuk',
            'total_keluar',
            'total_keseluruhan',
        ));
    }
}
