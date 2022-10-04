@extends('layouts/main')

@section('container')
    <div class="col-lg-12 text-center mb-4">
        <h1 class="animate__animated animate__zoomInRight animate__delay-2s"
            style="text-shadow: 2px 8px 6px rgba(0,0,0,0.2),
    0px -5px 35px rgba(255,255,255,0.3);">{{ $title }}
        </h1>

        <div class="container">
            <div class="row">
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-6 p-4">
                            <img src="/img/categ.jpg" class="img-fluid" alt="Sample image">
                        </div>
                        @foreach ($categories as $category)
                            <div class="col-lg-3 mb-3">
                                <div class="card bg-dark text-white" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <img src="https://source.unsplash.com/1200x400?{{ $category->name }}" class="card-img"
                                        alt="{{ $category->name }}">
                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                        <h5 class="card-title text-center flex-fill p-4"><a
                                                class="text-white text-decoration-none"
                                                style="background-color: rgba(6, 24, 44, 0.65"
                                                href="/blog?category={{ $category->slug }}">{{ $category->name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endsection
