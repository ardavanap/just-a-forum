<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'topic_id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(QuestionComment::class);
    }





    public function getIsOwnerAttribute() {

        if($this->user_id == auth()->id()) {
            return true;
        }

        return false;
    }

}
