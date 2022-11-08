<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/blog/index', [
            'blog' => Post::where('user_id', auth()->user()->id)->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/blog/create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validasi form create blog
        $Validatedata = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'img' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ]);


        $Validatedata['user_id'] = auth()->user()->id;
        $Validatedata['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::create($Validatedata);
        return redirect("/dashboard/blog")->with('success', 'Blog anda berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $blog)
    {
        if ($blog->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard/blog/show', [
            'post' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        if ($blog->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard/blog/edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $blog)
    {
        // validasi form create blog
        $rules = [
            'title' => 'required|max:255',
            'img' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ];
        if ($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $Validatedata = $request->validate($rules);

        $Validatedata['user_id'] = auth()->user()->id;
        $Validatedata['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::where('id', $blog->id)->update($Validatedata);
        return redirect("/dashboard/blog")->with('success', 'Blog anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        Post::destroy($blog->id);
        return redirect("/dashboard/blog")->with('success', 'Blog anda berhasil dihapus');
    }
}
