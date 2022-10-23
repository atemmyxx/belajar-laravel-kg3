@extends('layouts/main')

@section('container')
    <section class="vh-100 mt-2">
        <div class="col-lg-12 text-center mb-4">
            <h1 class="animate__animated animate__heartBeat animate__infinite"
                style="text-shadow: 2px 8px 6px rgba(0,0,0,0.2),
            0px -5px 35px rgba(255,255,255,0.3);">LOGIN</h1>

        </div>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 shadow p-4">

                    {{--  penggunaan alert jika user berhasil registrasi --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Notifikasi Jika gagal login --}}
                    @if (session()->has('loginErrors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginErrors') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- *********************************************** --}}
                    
                    <form action="/login" method="post">
                        {{--   @csrf berfungsi untuk mengamankan form dari serangan --}}
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email"
                                class="form-control shadow-sm @error('email') is-invalid @enderror"
                                placeholder="Example@gmail.com" required autofocus value="{{ old('email') }}">
                            <label class="form-label fw-bolder" for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password"
                                class="form-control shadow-sm @error('password') is-invalid @enderror"
                                placeholder="Enter password" required autofocus>
                            <label class="form-label fw-bolder" for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-md mb-4"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                            <div class="ext-center text-lg-start pt-2 "
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                <p class="text-center fw-bold mx-3 mb-0">ATAU</p>
                            </div>
                            <p class="lead fw-bolder mb-3 me-3">Sign in with</p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="bi bi-facebook"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="bi bi-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="bi bi-linkedin"></i>
                            </button>
                            <p class="small fw-bold mt-4 pt-1 mb-0">Nggak punya akun?
                                <a href="/register" class="btn btn-success"> Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
