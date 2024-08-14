@extends('layout.main')

@section('content')
<br>
<h2>Daftar Mahasiswa</h2>

<style>
    .table th{
        background-color: #1732dfb3;
        color: white;
    }
    .card {
        box-shadow: 0 8px 5px rgba(0, 0, 0, 0.2);
    }
</style> 

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Alamat</th>
            </tr>
        <tr>
            @foreach($mahasiswas as $mahasiswa)
            <tr>
        
                <td>{{$mahasiswas->firstItem()+$loop->index}}</td>     
                <td>{{$mahasiswa->nama_lengkap}}</td>
                <td>{{$mahasiswa->email}}</td>
                <td>{{$mahasiswa->prodi->nama}}</td>
                <td>{{$mahasiswa->alamat}}</td>
            </tr>
            @endforeach
        </tr>
        
        </table>
        {{ $mahasiswas->links() }}
        
    </div>
</div> 


@endsection