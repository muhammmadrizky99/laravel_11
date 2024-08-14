@extends('layout.main')

@section('content')
<br>
    <h2>Daftar Berita</h2>

    <style>
        .table th{
            background-color: #1732dfb3;
            color: white;
        }.card {
        box-shadow: 0 8px 5px rgba(0, 0, 0, 0.2);
    }
    </style> 

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Excerpt</th>
                <th>Gambar</th>
            </tr>
            @foreach ($beritas as $berita)
            <tr>
                <td>{{ $beritas->firstItem() + $loop->index }}</td>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->kategori->nama_kategori }}</td>
                <td>{{ $berita->user->name }}</td>
                <td>{{ $berita->excerpt }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="/storage/berita/{{ $berita->gambar }}" class="card-img-top d-block mx-auto" alt="...">
                            <div class="card-body">
                                <p class="card-text">{!! $berita->isi_berita !!}</p>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $beritas->links() }}
        
    </div>
</div> 
    

@endsection
