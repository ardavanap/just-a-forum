<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\User;
use App\models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionComment>
 */
class QuestionCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomQuestionId = Question::inRandomOrder()->first()->id ?? null;
        $randomUserId = User::inRandomOrder()->first()->id ?? null;
        
        return [
            'user_id' => $randomUserId,
            'question_id' => $randomQuestionId,
            'content' => fake()->paragraph(2)
        ];
    }
}
