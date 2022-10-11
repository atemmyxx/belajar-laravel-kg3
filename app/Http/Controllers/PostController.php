<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // untuk halaman category
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = '|' . $category->name;
        };

        // untuk halaman author
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' | ' . $author->name;
        };



        return view('blog', [
            'title' => 'All Blog ' . $title,
            'active' => 'blog',
            // 'blog' => Post::all()
            // fungsi latest untuk menampilankan data terbaru
            'blog' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => 'singel post',
            'active' => 'blog',
            "post" => $post
        ]);
    }
}
