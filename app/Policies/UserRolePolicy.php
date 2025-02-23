<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserRolePolicy
{
    public function update(User $user, User $model): bool
    {
        return $user->roles->contains('name', 'admin');
    }


}
