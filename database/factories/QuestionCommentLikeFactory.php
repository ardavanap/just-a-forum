<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\QuestionComment;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionCommentLike>
 */
class QuestionCommentLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user =User::query()->inRandomOrder()->first();

        return [
            'user_id' => $user,
            'question_comment_id' => $user->questionComments()->inRandomOrder()->first()
        ];
    }
}
