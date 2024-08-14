@extends('layout.main')

@section('content')
@section('title','Data Dosen')
@section('navDosen','active')
<br>
<h2>Daftar Dosen</h2>
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
                <th>Nik</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Alamat</th>
            </tr>
            @foreach($dosens as $namaDosen)
            <tr>
            
            <td>{{$dosens->firstItem()+$loop->index}}</td>
            <td>{{$namaDosen->nik}}</td>
            <td>{{$namaDosen->nama}}</td>
            <td>{{$namaDosen->email}}</td>
            <td>{{$namaDosen->prodi->nama}}</td>
            <td>{{$namaDosen->alamat}}</td>
            
            @endforeach
        </tr>
        </table>
        {{ $dosens->links() }}
        
    </div>
</div> 


@endsection