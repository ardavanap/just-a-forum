<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{

    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['title'];

    public function users()
    {
        $this->belongsToMany(User::class, 'tag_user', 'tag_id', 'user_id');
    }

    public function blogs()
    {
        $this->belongsToMany(Blog::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}
