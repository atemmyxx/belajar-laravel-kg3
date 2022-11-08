@extends('dashboard/layouts/main')

@section('container')
    <div class="card mb-3" style="max-width: 1000px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-body">
                    <a href="/dashboard/blog/{{ $post->slug }}/edit" class="btn btn-warning" class="badge bg-info"><span
                            data-feather="edit"></span>Edit</a>
                    <form action="/dashboard/blog/{{ $post->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('yakin mau hapus?')"> <span
                                data-feather="trash-2"></span>Delete</button>
                    </form>
                    <h4 class="card-title mt-3">{{ $post->title }}</h4>
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                    {{-- menampilkan perintah html di dalam laravel --}}
                    <p class="card-text">{!! $post->body !!}</p>
                    {{-- ------------------------------------------- --}}
                    <a href="/dashboard/blog" class="btn btn-outline-danger"> kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
