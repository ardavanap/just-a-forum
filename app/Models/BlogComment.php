<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class BlogComment extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
        'parent_id',
        'content'
    ];
    
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogCommentLike()
    {
        return $this->hasMany(BlogCommentLike::class);
    }




    public function getIsOwnerAttribute() {

        if($this->user_id == auth()->id()) {
            return true;
        }

        return false;
    }


}
