@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Edit Blog</h4>
    </div>
    <div class="col-lg-8 fw-bold">
        <form method="POST" action="/dashboard/blog/{{ $blog->slug }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    value="{{ old('title', $blog->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                    id="slug"value="{{ old('slug', $blog->slug) }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Gambar</label>
                <input type="text" name="img" class="form-control @error('img') is-invalid @enderror" id="img"
                    value="{{ old('img', $blog->img) }}" required>
                @error('img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category)
                        {{-- pengkodisian agar category yg dipilih sebelumnya tidak hilang/berubah --}}
                        @if (old('category_id', $blog->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">body</label>
                <input id="body" type="hidden" name="body" value="{{ old('slug', $blog->body) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning mt-3">Update</button>
        </form>
    </div>

    {{-- membuat slug otomatis mengikuti apa yang ditulis di title   --}}
    <script>
        // ambil title
        const title = document.querySelector("#title");
        // kemudian ambil slug
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });


        // untuk menghilangkan fungsi upload pada body di create blog
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
