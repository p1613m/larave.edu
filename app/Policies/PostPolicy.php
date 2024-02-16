<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function manage(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }
}
