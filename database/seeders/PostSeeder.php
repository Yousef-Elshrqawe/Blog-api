<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Post 1',
                'body' => 'Post 1 body',
                'can_comment' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
                'image' => 'https://picsum.photos/200/300',
                'user_id' => 1,
            ],
            [
                'title' => 'Post 2',
                'body' => 'Post 2 body',
                'can_comment' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
                'image' => 'https://picsum.photos/200/300',
                'user_id' => 1,
            ],
            [
                'title' => 'Post 3',
                'body' => 'Post 3 body',
                'can_comment' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
                'image' => 'https://picsum.photos/200/300',
                'user_id' => 1,
            ],
            [
                'title' => 'Post 4',
                'body' => 'Post 4 body',
                'can_comment' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
                'image' => 'https://picsum.photos/200/300',
                'user_id' => 1,
            ],
            [
                'title' => 'Post 5',
                'body' => 'Post 5 body',
                'can_comment' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
                'image' => 'https://picsum.photos/200/300',
                'user_id' => 1,
            ],
            [
                'title' => 'Post 6',
                'body' => 'Post 6 body',
                'can_comment' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
                'image' => 'https://picsum.photos/200/300',
                'user_id' => 1,
            ]
        ];

        foreach ($posts as $post) {
            \App\Models\Post::create($post);
        }


    }
}
