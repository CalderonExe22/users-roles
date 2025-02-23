<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{


    public function index()
    {
        Gate::authorize('viewAny', User::class);        
        $users = User::withTrashed()->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        Gate::authorize('view', $user);
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        Gate::authorize('create', User::class);
        $roles = Role::all();
        $isEdit = false;
        return view('users.create', ['user' => new User, 'roles' => $roles, 'isEdit' => $isEdit]);
    }

    public function store(SaveUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        if ($request->has('roles')) {
            $user->roles()->attach($request->roles); // Asignar roles seleccionados
        }
        toastr()->positionClass('toast-top-center')->success('El usuario a sido creado.');
        return to_route('users.index', ['user' => $request])->with('status', 'User created successfully');
    }

    public function edit(User $user)
    {
        Gate::authorize('update', $user);
        $roles = Role::all();
        $isEdit = true;
        return view('users.edit', ['user' => $user,'roles' => new Role, 'isEdit' => $isEdit]);
    }

    public function update(SaveUserRequest $request, User $user)
    {
        $user->update($request->validated());
        toastr()->positionClass('toast-top-center')->success('El usuario a sido actualizado.');
        return to_route('users.show', ['user' => $user])->with('status', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);
        $user->delete();
        toastr()->positionClass('toast-top-center')->success('El usuario a sido deshabiliado.');
        return to_route('users.index')->with('status', 'User deleted successfully');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        Gate::authorize('restore', $user );
        $user->restore();
        toastr()->positionClass('toast-top-center')->success('El usuario a sido restaurado.');
        return to_route('users.index', ['user' => $user])->with('status', 'User restored successfully');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->find($id);
        Gate::authorize('forceDelete', User::class);
        $user->forceDelete();
        toastr()->positionClass('toast-top-center')->success('El usuario a sido eliminado completamente.');

        return to_route('users.index')->with('status', 'User permanently deleted successfully');
    }

}
