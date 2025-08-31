<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\BlogComment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogCommentLike>
 */
class BlogCommentLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first(),
            'blog_comment_id' => BlogComment::query()->inRandomOrder()->first()
        ];
    }
}
