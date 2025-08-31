<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()
            ->count(25)
            ->sequence(
                ['title' => 'PHP'],
                ['title' => 'Java Script'],
                ['title' => 'Golang'],
                ['title' => 'Python'],
                ['title' => 'C/C++'],
                ['title' => 'React'],
                ['title' => 'Angular'],
                ['title' => 'Django'],
                ['title' => 'Ruby'],
                ['title' => 'Laravel'],
                ['title' => 'Spring'],
                ['title' => 'Vue.js'],
                ['title' => 'Bash'],
                ['title' => 'Powershell'],
                ['title' => 'Linux'],
                ['title' => 'Devops'],
                ['title' => 'Docker'],
                ['title' => 'Git'],
                ['title' => 'Java'],
                ['title' => 'HTML'],
                ['title' => 'CSS'],
                ['title' => 'Objective-C'],
                ['title' => 'Perl'],
                ['title' => 'C#'],
                ['title' => 'Flask'],
            )
            ->create();
    }
}
