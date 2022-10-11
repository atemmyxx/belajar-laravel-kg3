@extends('layouts/main')


@section('container')
    <h2 class="mb-5 text-center">{{ $title }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <form class="d-flex" action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <input class="form-control me-2" type="text" placeholder="Search" name="search"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Lanjut</button>
            </form>
        </div>
    </div>

    @if ($blog->count())
        <div class="card mb-3"
            style="box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;">
            <img src="https://source.unsplash.com/1200x400?{{ $blog[0]->category->name }}" class="card-img-top"
                alt="{{ $blog[0]->category->name }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $blog[0]->title }}</h5>
                <p style="font-weight: bold">By. <a href="/blog?author={{ $blog[0]->author->username }}"
                        class="text-decoration-none">{{ $blog[0]->author->name }}</a> | <a
                        href="/blog?category={{ $blog[0]->category->slug }}"
                        class="text-decoration-none">{{ $blog[0]->category->name }}
                        <small class="text-muted">{{ $blog[0]->created_at->diffforHumans() }}</small></p></a>
                <p class="card-text">{{ $blog[0]->excerpt }}</p>
                <a href="/blog/{{ $blog[0]->slug }}" class="btn btn-outline-primary"> lanjut</a>
            </div>
        </div>


        <div class="container mt-5">
            <div class="row">
                @foreach ($blog->skip(1) as $post)
                    <div class="col-lg-6 mb-4">
                        <div class="card mb-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <div class="row g-0">
                                <div class="col">
                                    <div class="position-absolute m-2 px-3 py-2  "
                                        style="background-color: rgba(6, 24, 44, 0.65)"><a
                                            href="/blog?category={{ $post->category->slug }}"
                                            class="text-white text-decoration-none">{{ $post->category->name }}</a>
                                    </div>
                                    <img src="https://source.unsplash.com/500x700?{{ $post->category->name }}"
                                        class="img-fluid rounded-start img-thumbnail" alt="{{ $post->category->name }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p style="font-weight: bold">By. <a
                                                href="/blog?author={{ $post->author->username }}"
                                                class="text-decoration-none">{{ $post->author->name }}</a>
                                            <small class="text-muted">{{ $post->created_at->diffforHumans() }}</small>
                                        </p>
                                        <p class="card-text">{{ $post->excerpt }}</p>
                                        <a href="/blog/{{ $post->slug }}" class="btn btn-primary"> lanjut</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center">NGGA ADA NJIR</div>
    @endif
    {{-- untuk paginations --}}
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $blog->links() }}
        </ul>
    </nav>
@endsection
