@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Mahasiswa</h1>
    </div>

    <div class="col-6">
        <form action="/dashboard-mahasiswa/{{ $mahasiswa->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim"
                    value="{{ old('nim', $mahasiswa->nim) }}"readonly>
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text"
                    class="form-control @error('nama_lengkap') is-invalid                 
                @enderror"
                    name="nama_lengkap" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}">

                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text"
                    class="form-control @error('tempat_lahir') is-invalid                   
                @enderror"
                    name="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}">
                @error('tempat_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date"
                    class="form-control @error('tgl_lahir') is-invalid
                    
                @enderror"
                    name="tgl_lahir" value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}">
                @error('tgl_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                    class="form-control @error('email') is-invalid
                    
                @enderror"
                    name="email" value="{{ old('email', $mahasiswa->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Prodi</label>
                <select class="form-select @error('prodi_id') is-invalid @enderror" name="prodi_id">
                    <option value="">--pilih prodi--</option>
                    @foreach ($prodis as $prodi)
                        @if (old('prodi_id', $mahasiswa->prodi_id) == $prodi->id)
                            <option value="{{ $prodi->id }}" selected>{{ $prodi->nama }}</option>
                        @else
                            <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                        @endif
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
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
@endsection
