<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::factory()
            ->count(20)
            ->sequence(
                ['title' => 'Laravel'],
                ['title' => 'php'],
                ['title' => 'Golang'],
                ['title' => 'Ruby'],
                ['title' => 'Java'],
                ['title' => 'JavaScript'],
                ['title' => 'C/C++'],
                ['title' => 'Rust'],
                ['title' => 'HTML'],
                ['title' => 'CSS'],
                ['title' => 'HTTP'],
                ['title' => 'Network'],
                ['title' => 'Security'],
                ['title' => 'Devops'],
                ['title' => 'Docker'],
                ['title' => 'Git'],
                ['title' => 'Python'],
                ['title' => 'Django'],
                ['title' => 'React'],
                ['title' => 'Angular'],
            )
            ->create();
    }
}
