@extends('layout.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-4">


<main class="form-signin w-100 m-auto shadow">
    <form method="POST" action="/login">
        @csrf
      
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
  
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror"
         id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
            
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control 
        @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
            
        @enderror
      </div>
  
      
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-body-secondary text-center">Do not have an account? please <a href="/register" class="btn btn-outline-success">Register</a></p>
      <p class="mt-5 mb-3 text-body-secondary text-center">&copy; <?=date('Y')?></p>
    </form>
  </main>

</div>

</div>


@endsection