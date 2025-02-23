<?php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Verifica si el usuario tiene el rol 'admin' o 'reader'
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        // Verifica si el usuario tiene el rol 'admin' o 'reader'
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Solo los usuarios con el rol 'admin' pueden crear usuarios
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Solo los usuarios con el rol 'admin' pueden actualizar usuarios
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Solo los usuarios con el rol 'admin' pueden eliminar usuarios
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        // Solo los usuarios con el rol 'admin' pueden restaurar usuarios
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        // Solo los usuarios con el rol 'admin' pueden eliminar permanentemente usuarios
        return $user->roles->contains('name', 'admin');
    }
}