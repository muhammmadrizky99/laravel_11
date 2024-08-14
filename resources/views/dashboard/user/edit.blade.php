@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>

    <div class="col-6">
        <form action="/dashboard-user/{{ $item->id }}" method="post">
            @method('PUT')
            @csrf
           

            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control @error('name') is-invalid                 
                @enderror" name="name" value="{{ old('name',$item->name) }}">

                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>
            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid                 
                @enderror" name="email" value="{{ old('email',$item->email) }}">

                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-3">
                <label for="password" class="form-label"> Password</label>
                <input type="text" class="form-control @error('password') is-invalid                 
                @enderror" name="password" placeholder="Ganti password (opsional)" >

                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                  
                @enderror
            </div>

           
            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
@endsection