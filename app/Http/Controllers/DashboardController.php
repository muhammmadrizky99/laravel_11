<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Userr;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaPerProdi = Mahasiswa::select('prodi_id', DB::raw('count(*) as total'))
        ->groupBy('prodi_id')
        ->get();

        $dosenCount = Dosen::count();
        $prodiCount = Prodi::count();
        $kategoriCount = Kategori::count();
        $beritaCount = Berita::count();
        $userCount = Userr::count();

        return view('dashboard.index', compact('mahasiswaPerProdi', 'dosenCount', 'prodiCount', 'kategoriCount', 'beritaCount', 'userCount'));
    }
}
