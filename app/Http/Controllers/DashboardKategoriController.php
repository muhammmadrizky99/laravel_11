<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $kategoris=Kategori::latest()->where('nama_kategori','LIKE','%'.$request->search.'%')->paginate(10);
        }
        else{
        $kategoris=Kategori::latest()->paginate(10);
    }
        return view('dashboard.kategori.index',['kategoris'=>$kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'nama_kategori' => 'required|min:3',
           
        ]);
        Kategori::create($validated);
        return redirect('dashboard-kategori')->with('pesan','Data berhasil ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.kategori.edit',['kategori'=>Kategori::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            
            'nama_kategori' => 'required|min:3',
            
        ]);
        Kategori::where('id',$id)->update($validated);
        return redirect('dashboard-kategori')->with('pesan','Data berhasil di update   !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);
        return redirect('/dashboard-kategori')->with('pesan','Data berhasil dihapus!');
    }
}
