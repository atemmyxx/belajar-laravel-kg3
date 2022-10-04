<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Ahmad Temmy Rietoni',
        //     'email' => 'temmy@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);


        User::factory(3)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Non Programming',
            'slug' => 'non-programming'
        ]);

        Post::factory(20)->create();

        // User::create([
        //     'name' => 'Sandhika Galih',
        //     'email' => 'sandhika@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        // Post::create([
        //     'title' => 'PHP Komplet',
        //     'slug' => 'php-komplet',
        //     'img' => 'php.jpg',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta    architecto vel voluptas laudantium. A libero optio eligendi dolore',
        //     'body' => ' <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta architecto vel voluptas laudantium. A libero optio eligendi dolore </p> <p>cupiditate explicabo autem quos quibusdam deserunt nam nostrum sed modi inventore, quasi unde dolores! Quisquam aspernatur quia, dolor dicta eos quae aliquam nam laudantium nemo quibusdam laborum ducimus vitae minima aliquid fugit! Optio, placeat. Commodi aut obcaecati adipisci voluptas, accusantium odit quibusdam a debitis non praesentium est officiis id vel numquam eos aperiam voluptate ut recusandae, doloribus unde pariatur atque deleniti aliquam. Fugiat dolorem quod iusto sapiente repudiandae corrupti, nesciunt quas deserunt dicta tempora modi ipsam officia deleniti, minima ipsum</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Detektif Conan',
        //     'slug' => 'detektif-conan',
        //     'img' => 'conan.jpg',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta    architecto vel voluptas laudantium. A libero optio eligendi dolore',
        //     'body' => ' <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta architecto vel voluptas laudantium. A libero optio eligendi dolore </p> <p>cupiditate explicabo autem quos quibusdam deserunt nam nostrum sed modi inventore, quasi unde dolores! Quisquam aspernatur quia, dolor dicta eos quae aliquam nam laudantium nemo quibusdam laborum ducimus vitae minima aliquid fugit! Optio, placeat. Commodi aut obcaecati adipisci voluptas, accusantium odit quibusdam a debitis non praesentium est officiis id vel numquam eos aperiam voluptate ut recusandae, doloribus unde pariatur atque deleniti aliquam. Fugiat dolorem quod iusto sapiente repudiandae corrupti, nesciunt quas deserunt dicta tempora modi ipsam officia deleniti, minima ipsum</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'From Hobby to Money',
        //     'slug' => 'from-hobby-to-money',
        //     'img' => 'hobby.jpg',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta    architecto vel voluptas laudantium. A libero optio eligendi dolore',
        //     'body' => ' <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta architecto vel voluptas laudantium. A libero optio eligendi dolore </p> <p>cupiditate explicabo autem quos quibusdam deserunt nam nostrum sed modi inventore, quasi unde dolores! Quisquam aspernatur quia, dolor dicta eos quae aliquam nam laudantium nemo quibusdam laborum ducimus vitae minima aliquid fugit! Optio, placeat. Commodi aut obcaecati adipisci voluptas, accusantium odit quibusdam a debitis non praesentium est officiis id vel numquam eos aperiam voluptate ut recusandae, doloribus unde pariatur atque deleniti aliquam. Fugiat dolorem quod iusto sapiente repudiandae corrupti, nesciunt quas deserunt dicta tempora modi ipsam officia deleniti, minima ipsum</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Statistika Dengan Program Komputer',
        //     'slug' => 'statistika-dengan-program-komputer',
        //     'img' => 'statistika.jpg',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta    architecto vel voluptas laudantium. A libero optio eligendi dolore',
        //     'body' => ' <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque soluta architecto vel voluptas laudantium. A libero optio eligendi dolore </p> <p>cupiditate explicabo autem quos quibusdam deserunt nam nostrum sed modi inventore, quasi unde dolores! Quisquam aspernatur quia, dolor dicta eos quae aliquam nam laudantium nemo quibusdam laborum ducimus vitae minima aliquid fugit! Optio, placeat. Commodi aut obcaecati adipisci voluptas, accusantium odit quibusdam a debitis non praesentium est officiis id vel numquam eos aperiam voluptate ut recusandae, doloribus unde pariatur atque deleniti aliquam. Fugiat dolorem quod iusto sapiente repudiandae corrupti, nesciunt quas deserunt dicta tempora modi ipsam officia deleniti, minima ipsum</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}
