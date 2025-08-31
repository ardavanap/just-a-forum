<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCommentLike extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'question_comment_id'
    ];

    public function user()
    {
        return $this->blongsTo(User::class);
    }

    public function questionComment()
    {
        return $this->hasOne(QuestionComment::class);
    }

}
