<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionComment extends Model
{
    protected $fillable =[
        'user_id',
        'question_id',
        'content',
        'approved'
    ];
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function questionCommentLike()
    {
        return $this->hasMany(QuestionCommentLike::class);
    }
    
}
