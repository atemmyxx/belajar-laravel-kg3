<!-- contoh pembuatan model yang kurang tepat -->

<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "img" => "kolaborasi.jpg",
            "slug" => "Kolaborasi-Codeigniter-Ajax",
            "judul" => "Kolaborasi-Codeigniter-Ajax",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio iste alias eius ex sapiente. Consequuntur recusandae eum exercitationem ipsum libero nisi voluptatem cupiditate beatae. Accusantium hic laudantium sed, facere doloremque vitae consequatur sunt quasi tempora odio, fuga id, deserunt eum modi porro iste tenetur perferendis quam. Eveniet explicabo corrupti quis."

        ],

        [
            "img" => "conan.jpg",
            "slug" => "Detektif-Conan",
            "judul" => "Detektif-Conan",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio iste alias eius ex sapiente. Consequuntur recusandae eum exercitationem ipsum libero nisi voluptatem cupiditate beatae. Accusantium hic laudantium sed, facere doloremque vitae consequatur sunt quasi tempora odio, fuga id, deserunt eum modi porro iste tenetur perferendis quam. Eveniet explicabo corrupti quis."

        ]
    ];
    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
