@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Dosen</h1>
    </div>

    <div class="col-6">
        <form action="/dashboard-dosen" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
                value="{{ old('nik') }}">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control @error('nama') is-invalid                 
                @enderror" name="nama" value="{{ old('nama') }}">

                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror

            </div>


            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid
                    
                @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label">No Telp</label>
                <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                value="{{ old('no_telp') }}">
                @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label">Prodi</label>
                <select class="form-select @error('prodi_id') is-invalid @enderror"
                name="prodi_id">
                <option value="">--pilih prodi--</option>
                @foreach ( $prodis as $prodi )
                <option value="{{ $prodi->id }}" @if(old('prodi_id') == $prodi->id) selected @endif>
                {{ $prodi->nama }}
                </option>
                    
                @endforeach
            </select>
            @error('prodi_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>              
            @enderror
                
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror"
                name="alamat" rows="3">{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
@endsection