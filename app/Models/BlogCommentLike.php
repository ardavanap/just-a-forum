<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentLike extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'blog_comment_id'
    ];

    public function user()
    {
        return $this->blongsTo(User::class);
    }

    public function blogComment()
    {
        return $this->hasOne(BlogComment::class);
    }

}
