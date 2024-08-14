<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DashboardProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $prodis=Prodi::latest()->where('nama','LIKE','%'.$request->search.'%')->paginate(10);
        }
        else{
        $prodis=Prodi::latest()->paginate(10);
    }
        return view('dashboard.prodi.index',['prodis'=>$prodis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'nama' => 'required|min:3',
           
        ]);
        Prodi::create($validated);
        return redirect('dashboard-prodi')->with('pesan','Data berhasil ditambahkan!');
        
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
        return view('dashboard.prodi.edit',['prodi'=>Prodi::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            
            'nama' => 'required|min:3',
            
        ]);
        Prodi::where('id',$id)->update($validated);
        return redirect('dashboard-prodi')->with('pesan','Data berhasil di update   !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);
        return redirect('/dashboard-prodi')->with('pesan','Data berhasil dihapus!');
    }
}
