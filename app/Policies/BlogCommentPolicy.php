<?php

namespace App\Policies;

use App\Models\BlogComment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogCommentPolicy
{

    public function edit(User $user): bool
    {
        return ($user->isAdmin());
    }

    public function update(User $user, BlogComment $blogComment): bool
    {
        return ($user->isAdmin()) || ($user->id == $blogComment->user_id);
    }

    
    public function delete(User $user, BlogComment $blogComment): bool
    {
        return ($user->isAdmin()) || ($user->id == $blogComment->user_id);
    }

}
