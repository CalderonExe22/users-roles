<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class UserRoleController extends Controller
{
    
    // Mostrar el formulario para asignar/quitar roles
    public function edit(User $user)
    {
        Gate::authorize('update', $user);
        $roles = Role::all();
        return view('user_role.assign-roles', compact('roles','user'));
    }

    // Asignar/quitar roles al usuario
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return to_route('users.index')->with('success', 'Roles assigned successfully.');
    }

}
