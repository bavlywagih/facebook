<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++) {
    Comment::create([
        'body' => fake()->text(rand(200, 500)),
        'user_id' => rand(1, 1 + 100 + 5 + 20),
        'post_id' => rand(1, (100 * 3) + 5 + (20 * 2)),
        'created_at' => now()->subDays(rand(0, 7)),
        'updated_at' => now()->subDays(rand(0, 7)),
    ]);
    };
}
}
