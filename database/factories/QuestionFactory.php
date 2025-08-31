<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Topic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       =>   User::query()->inRandomOrder()->first(),
            'topic_id'      =>   Topic::query()->inRandomOrder()->first(),
            'title'         =>   fake('fa_IR')->text(30),
            'content'       =>   fake('fa_IR')->text(500),
            'solved'        =>   fake()->boolean(60),
            'created_at'    =>   now(),
            'updated_at'    =>   now()
        ];
    }
}
