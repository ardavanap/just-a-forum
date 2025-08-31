<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roll extends Model
{

    use HasFactory;

    public function level()
    {
        return $this->hasMany(User::class);
    }
}
