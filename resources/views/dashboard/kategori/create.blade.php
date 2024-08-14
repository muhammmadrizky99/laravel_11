@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form entry kategori</h1>
    </div>

    <div class="col-6">
        <form action="/dashboard-kategori" method="post">
            @csrf
            

            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid                 
                @enderror" name="nama_kategori" value="{{ old('nama_kategori') }}">

                @error('nama_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror

            </div>

            
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
@endsection