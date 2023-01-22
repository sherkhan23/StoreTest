<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CategoryLevel;
use App\Models\Post;
use App\Models\PostParameter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categoryLevel = [
            [
                'categoryLevel' => 1,
            ],
            [
                'categoryLevel' => 2,
            ]
        ];

//        CategoryLevel::insert($categoryLevel);

        $products = [
            [
                'postName' => 'Book 1',
                'description' => 'lorem ipsum',
                'slug' => 'book-1',
                'category_level_id' => 24,
                'price' => 250,
            ],
            [
                'postName' => 'Book 2',
                'description' => 'lorem ipsum2',
                'slug' => 'book-2',
                'category_level_id' => 24,

                'price' => 500,
            ],
            [
                'postName' => 'Book 3',
                'description' => 'lorem ipsum3',
                'slug' => 'book-3',
                'category_level_id' => 24,

                'price' => 250,
            ],
            [
                'postName' => 'Book 4',
                'description' => 'lorem ipsum4',
                'slug' => 'book-4',
                'category_level_id' => 24,

                'price' => 20000,
            ],
            [
                'postName' => 'Book 5',
                'description' => 'lorem ipsum5',
                'slug' => 'book-5',
                'category_level_id' => 26,
                'price' => 4000,
            ]
        ];

//        Post::insert($products);

        $parameters = [
            [
                'post_id' => 46,
                'weight' => 200,
                'width' => 20,
                'height' => 50,
            ],
            [
                'post_id' => 47,
                'weight' => 120,
                'width' => 30,
                'height' => 60,
            ],
            [
                'post_id' => 48,
                'weight' => 400,
                'width' => 20,
                'height' => 56,
            ],
            [
                'post_id' => 49,
                'weight' => 100,
                'width' => 23,
                'height' => 50,
            ],
            [
                'post_id' => 50,
                'weight' => 340,
                'width' => 40,
                'height' => 51,
            ]
        ];
        PostParameter::insert($parameters);
    }
}
