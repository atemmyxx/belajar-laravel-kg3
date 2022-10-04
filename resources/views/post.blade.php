@extends('layouts/main')

@section('container')
    <div class="card mb-3" style="max-width: 1000px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p style="font-weight: bold">By. <a href="/blog?author={{ $post->author->username }}"
                            class="text-decoration-none">{{ $post->author->name }}</a>| <a
                            href="/blog?category={{ $post->category->slug }}"
                            class="text-decoration-none">{{ $post->category->name }}</p></a>
                    <img src="https://source.unsplash.com/1200x700?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                    {{-- menampilkan perintah html di dalam laravel --}}
                    <p class="card-text">{!! $post->body !!}</p>
                    {{-- ------------------------------------------- --}}
                    <a href="/blog" class="btn btn-outline-danger"> kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
