<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $beritas = Berita::pencarian()->latest()->paginate(10);
        return view('dashboard.berita.index', ['beritas' => $beritas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('dashboard.berita.create', ['kategoris' => Kategori::all(), 'users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
            'id_user' => 'required|exists:users,id',
            'kutipan' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg|max:2024',
            'content' => 'required'

        ]);

        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/berita', $imageName);

        Berita::create([
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'id_user' => $request->id_user,
            'excerpt' => $request->kutipan,
            'gambar' => $imageName,
            'isi_berita' => $request->content,
        ]);
        return redirect('dashboard-berita')->with('pesan', 'Data berhasil ditambahkan!');
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
        $item = Berita::find($id);
        $users = User::all();
        $kategoris = Kategori::all();
        // $existingContent = $item->content;

        return view('dashboard.berita.edit', compact('item', 'users', 'kategoris'));
        // return view('dashboard.berita.edit',['kategoris'=>Kategori::all(),'item'=>Berita::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required',
            'id_user' => 'required',
            'kutipan' => 'required',
            'gambar' => 'nullable|mimes:jpg,png,jpeg|max:2024',
            'content' => 'nullable',
        ]);

        $berita = Berita::find($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/berita', $imageName);
            $berita->gambar = $imageName;
        }

        $berita->judul = $request->judul;
        $berita->id_kategori = $request->id_kategori;
        $berita->id_user = $request->id_user;
        $berita->excerpt = $request->kutipan;
        $berita->isi_berita = $request->content;

        $berita->save();

        return redirect('dashboard-berita')->with('pesan', 'Data berhasil diupdate!');
        // Berita::where('id',$id)->update($validated);
        // return redirect('dashboard-berita')->with('pesan','Data berhasil di update   !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Berita::destroy($id);
        return redirect('/dashboard-berita')->with('pesan', 'Data berhasil dihapus!');
    }
}
