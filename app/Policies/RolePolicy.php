<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Solo los admins pueden ver la lista de roles
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        // Solo los admins pueden ver un rol específico
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Solo los admins pueden crear roles
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        // Solo los admins pueden actualizar roles
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        // Solo los admins pueden eliminar roles
        return $user->roles->contains('name', 'admin');
    }
    public function restore(User $user,  Role $role): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user,  Role $role): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}