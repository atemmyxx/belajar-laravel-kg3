@extends('layouts/main')

@section('container')
    <section class="vh-100 mt-2">
        <div class="col-lg-12 text-center mb-4">
            <main class="form-registration">
                <h1 class="animate__animated animate__heartBeat animate__infinite"
                    style="text-shadow: 2px 8px 6px rgba(0,0,0,0.2), 0px -5px 35px rgba(255,255,255,0.3);">
                    DAFTAR
                </h1>

        </div>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 shadow p-4">
                    <form action="/register" method="post">
                        {{--   @csrf berfungsi untuk mengamankan form dari serangan --}}
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="name" required value="{{ old('name') }}">
                            <label for="name">Nama </label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="username" required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="email" required value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center pt-2 d-block justify-content-center">
                            <button type="submit" class="btn btn-primary btn-md mb-4"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                    </form>
                    <p class="small fw-bold pt-1 mb-0">Udah punya akun?
                        <a href="/login" class="btn btn-success"> Login</a>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
