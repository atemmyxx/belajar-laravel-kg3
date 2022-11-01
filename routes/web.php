<?php


use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\registerController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Login;
use Illuminate\Routing\RouteRegistrar;

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

    ]);
});
Route::get('/about', function () {
    return view('about', [
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
// guest untuk user yang blm login/autentifikasi
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// untuk mengisi form login
Route::post('/login', [LoginController::class, 'authenticate']);
// untuk logout
Route::post('/logout', [LoginController::class, 'logout']);

// terhubung dngn registerController
// karna register bebas diakses oleh user yang blm login maka digunakan guest
Route::get('/register', [registerController::class, 'index'])->middleware('guest');
// untuk mengisi form register
Route::post('/register', [registerController::class, 'store']);


// auth digunakan untuk user yang sudah login
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/blog', DashboardPostController::class)->middleware('auth');

// fungsi load sama seperti with yaitu mengoptimalkan database (memperkecil query)
