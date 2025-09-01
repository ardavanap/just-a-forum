<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];

//____________________________________________________________________________________________________________________
                                                        /** Start Of Relations Section **/


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }


    //____________________________________________________________________________________________________________________
                                                        /** End Of Relations Section **/


//____________________________________________________________________________________________________________________
                                                        /** Start Of Costume Methods Section **/
                                                        

}
