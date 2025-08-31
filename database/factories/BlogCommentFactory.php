<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogComment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogComment>
 */
class BlogCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->first();
        $blog = Blog::query()->inRandomOrder()->first();

        return [
            'user_id'           => $user,
            'blog_id'           => $blog,
            'parent_id'         => null,
            'content'           => fake()->paragraph(2),
            'created_at'        => now(),
            'updated_at'        => now()
        ];
    }

    public function withParent()
    {

        return $this->state(function (){
            if(random_int(0, 100) >= 75)
            {
                $comment = BlogComment::inRandomOrder()->first();
                return [
                   'parent_id' => $comment->id,
                   'blog_id' => $comment->blog_id
                ];

            }else{
                return [
                    'parent_id' => null
                ];
            }
            
        }
        );
    }

}
