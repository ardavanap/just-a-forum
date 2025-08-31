<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RollSeeder::class,
            TagSeeder::class,
            TopicSeeder::class,
            UserSeeder::class,
            QuestionSeeder::class,
            QuestionCommentSeeder::class,
            QuestionCommentLikeSeeder::class
        ]);
    }
}
