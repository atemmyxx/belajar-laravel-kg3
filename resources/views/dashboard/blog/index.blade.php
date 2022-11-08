@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>My Blogs | <span style="color: red">{{ auth()->user()->name }}</span></h4>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/blog/create" class="btn btn-success"><span data-feather="plus"></span>Create Blog</a>
        <table class="table table table-hover mt-3">
            <thead>
                <tr class="table-primary">
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $key => $post)
                    <tr>
                        <td>{{ $blog->firstItem() + $key }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->img }}</td>
                        <td>
                            <a href="/dashboard/blog/{{ $post->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/blog/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/blog/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('yakin mau hapus?')"><span
                                        data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- untuk paginations --}}
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $blog->links() }}
        </ul>
    </nav>
@endsection
