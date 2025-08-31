<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('fa_IR');
        return [
            'user_id' =>    User::factory(),
            'title' =>      fake('fa_IR')->unique()->text(14),
            'content' =>    fake('fa_IR')->text()
        ];
    }
}
