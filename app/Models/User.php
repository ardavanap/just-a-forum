<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, softDeletes;  //, HasApiTokens

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nickname',
        'email',
        'password',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

//____________________________________________________________________________________________________________________
                                                        /** Start Of Relations Section **/
    public function roll() 
    {
        return $this->belongsTo(Roll::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function questionComments()
    {
        return $this->hasMany(QuestionComment::class);
    }

    public function Topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function blogCommentLike()
    {
        return $this->hasMany(BlogCommentLike::class);
    }

    public function questionCommentLike()
    {
        return $this->hasMany(QuestionCommentLike::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_user', 'user_id', 'tag_id');
    }

//____________________________________________________________________________________________________________________
                                                        /** End Of Relations Section **/


//____________________________________________________________________________________________________________________
                                                        /** Start Of Costume Methods Section **/

    public static function isAdmin() {
        if(User::find(auth()->id())->roll_id == 1) {
            return true;
        }
            return false;
    }

                                                        /** End Of Costume Methods Section **/
//____________________________________________________________________________________________________________________
}