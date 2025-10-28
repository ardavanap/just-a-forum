<?php

namespace App\Policies;

use App\Models\QuestionComment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionCommentPolicy
{
    
    public function edit(User $user, QuestionComment $questionComment): bool
    {
        return ($user->isAdmin()) || ($user->id == $questionComment->user_id);
    }
    
    public function update(User $user, QuestionComment $questionComment): bool
    {
        return ($user->isAdmin()) || ($user->id == $questionComment->user_id);
    }

    
    public function delete(User $user, QuestionComment $questionComment): bool
    {
        return ($user->isAdmin()) || ($user->id == $questionComment->user_id);
    }
}
