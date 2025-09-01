<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Topic;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Question;
use App\Models\BlogCommentLike;
use App\Models\QuestionComment;
use Illuminate\Support\Facades\Hash;
use App\Models\QuestionCommentLike;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(20)           
            ->has(Blog::factory(random_int(2,8)))
            ->create();
        
        BlogComment::factory(220)->create();
        BlogComment::factory(130)->withParent()->create();
        BlogCommentLike::factory()->count(410)->create();
        

        User::factory()
            ->state(['nickname' => 'ardavan'])
            ->state(['password' => Hash::make('1234') ])
            ->state(['email' => 'ardavan@gmail.com'])
            ->state(['suspended' => 0])
            ->state(['roll_id' => 1])
            ->has(Blog::factory(5))
            ->has(Question::factory()
                ->count(4)
                ->sequence(['user_id' => '41'])
            )
                ->has(QuestionComment::factory()
                    ->state(['user_id' => '41'])
                    ->count(5)
                )
                ->create();
    }
}
// User::factory(20)           
// ->has(Topic::factory(random_int(1,3)))
// ->has(Question::factory(random_int(1, 7)))
// ->has(QuestionComment::factory(random_int(3, 10)))
// ->has(Blog::factory(random_int(2,8)))
// ->has(BlogComment::factory(random_int(5, 15)))
// ->has(BlogCommentLike::factory(random_int(7, 35)))
// ->create();
