@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Tambah Blog</h4>
    </div>
    <div class="col-lg-8 fw-bold">
        <form method="POST" action="/dashboard/blog">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" name="slug" class="form-control" id="slug" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">category</label>
                <select class="form-select" aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option value{{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">body</label>
                <input id="body" type="hidden" name="content">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
