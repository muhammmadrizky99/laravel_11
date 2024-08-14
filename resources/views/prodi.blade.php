@extends('layout.main')

@section('content')
@section('title','Data Prodi')
@section('navDosen','active')
<br>
<h2>Daftar prodi</h2>


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
                {{-- <th>Id prodi</th> --}}
                <th>Nama prodi</th>
            </tr>
            @foreach($prodis as $prodi_id)
            <tr>
            
            <td>{{$prodis->firstItem()+$loop->index}}</td>
            {{-- <td>{{$prodi->id}}</td> --}}
            <td>{{$prodi_id->nama}}</td>
          
            
            @endforeach
        </tr>
        
        </table>
        {{ $prodis->links() }}
    </div>
</div>


@endsection