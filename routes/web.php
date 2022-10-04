<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\registerController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Login; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('clicked');
});

Route::get('/nav', function () {
    return view('home', [
        'title' => 'Home',

    ]);
});

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'active' => 'about',
        'title' => 'About',
        'nama' => 'Ahmad Temmy Rietoni',
        'nim' => '17190348',
        'jurusan' => 'Teknologi Informasi',
        'fakultas' => 'Teknik dan Informatika'
    ]);
});

// untuk menampilkan semua post yang ada di blog
Route::get('/blog', [PostController::class, 'index']);
// halaman single post yang ada di blog
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('categories', function () {
    return view('categories', [
        'title' => 'Post Category',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// halaman single category
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('blog', [
//         'title' => "Blog by Category : $category->name",
//         'active' => 'categories',
//         'blog' => $category->blog->load('category', 'author'),
//     ]);
// });

// halaman authors
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('blog', [
//         'title' => "Blog by Author : $author->name",
//         'blog' => $author->blog->load('author', 'category'),
//         'active' => 'author',

//     ]);
// });

// terhubung dngn loginController
Route::get('/login', [LoginController::class, 'index' ]);

// terhubung dngn registerController
Route::get('/register', [registerController::class, 'index']);

// fungsi load sama seperti with yaitu mengoptimalkan database (memperkecil query)
