<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // yang bisa diisi
    // protected $fillable = ['title', 'slug', 'img', 'excerpt', 'body'];

    // yang tidak boleh/bisa diisi
    protected $guarded = ['id'];
    // fungsi with untuk mengoptimalkan query di database
    protected $with = ['author', 'category'];

    // BAGIAN UNTUK SEARCHING
    public function scopeFilter($query, array $filters)
    {
        // kalo didalam variabel $filters ada 'search' maka ambil apapun yang ada di dalam 'search',kalo misal tidak ada false
        $query->when($filters['search'] ?? false, function ($query, $search) {
            // cari berdasarkan title
            return $query->where('title', 'like', '%' . $search . '%');
            // atau cari berdasarkan body
            // ->orWhere('body', 'like', '%' . $search . '%');
        });

        // UNTUK MENCARI BERDASARKAN CATEGORY versi callback
        // kalo didalam variabel $filters ada 'category' maka ambil apapun yang ada di dalam 'search',kalo misal tidak ada false
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // wherehas diisi category berdasarkan relashionship category yg ada dibawah
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // UNTUK MENCARI BERDASARKAN AUTHOR VERSI arrow functions
        // kalo didalam variabel $filters ada 'category' maka ambil apapun yang ada di dalam 'search',kalo misal tidak ada false
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
