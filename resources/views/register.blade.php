@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">


            <main class="form-signin w-100 m-auto shadow">
                <form method="POST" action="/register">
                    @csrf

                    <h1 class="h3 mb-3 fw-normal">Register here!</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput"
                            name="name" placeholder="Username" value="{{ old('name') }}">
                        <label for="floatingInput">Username</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                            name="email" placeholder="Email" value="{{ old('email') }}">
                        <label for="floatingInput">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="password"
                            name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="password"
                            name="password_confirmation">
                        <label for="floatingPassword">Confirm Password</label>
                    </div>

                    {{-- captcha --}}

                    <img src="{{ captcha_src('math') }}" alt="captcha">

                    <div class="form-floating mt-2">
                    {{-- <div class="mt-2"></div> --}}
                    <input type="text" name="captcha" class="form-control mb-5  @error('captcha') is-invalid @enderror"
                        placeholder="Please Insert Captcha" id="floatingPassword">
                        <label for="floatingPassword">Type the captcha</label>
                    @error('captcha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                    


                    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                    <p class="mt-5 mb-3 text-body-secondary text-center">Have an account? Please <a href="/login"
                            class="btn btn-outline-success">Login</a></p>
                    <p class="mt-5 mb-3 text-body-secondary text-center">&copy; <?= date('Y') ?></p>
                </form>
            </main>

        </div>

    </div>
@endsection
