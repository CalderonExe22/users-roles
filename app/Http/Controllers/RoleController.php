<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{   
    
    public function index()
    {
        Gate::authorize('viewAny', Role::class);   
        $roles = Role::withTrashed()->get();
        return view('roles.index',['roles' => $roles]);
    }

    public function show(Role $role)
    {
        Gate::authorize('view', $role);
        return view('roles.show', ['role' => $role]);
    }

    public function create()
    {
        Gate::authorize('create', Role::class);
        return view('roles.create', ['role' => new Role]);
    }

    public function store(SaveRoleRequest $request)
    {
        Role::create($request->validated());
        toastr()->positionClass('toast-top-center')->success('El rol a sido creado.');

        return to_route('roles.index')->with('status','Role created successfully');
    }

    public function edit(Role $role)
    {
        Gate::authorize('update', $role);
        return view('roles.edit', ['role' => $role]);
    }

    public function update(SaveRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        toastr()->positionClass('toast-top-center')->success('El rol a sido actualizado.');
        return to_route('roles.index', ['role' => $role])->with('status','Role updated successfully');
    }

    public function destroy(Role $role)
    {
        Gate::authorize('delete', $role);
        $role->delete();
        toastr()->positionClass('toast-top-center')->success('El rol a sido deshabilitado.');
        return to_route('roles.index')->with('status','Role deleted successfully');
    }

    public function restore($id)
    {
        $role = Role::withTrashed()->find($id);
        Gate::authorize('restore', $role); 
        $role->restore();
        toastr()->positionClass('toast-top-center')->success('El rol a sido restaurado.');

        return to_route('roles.index')->with('status','Role restored successfully');
    }

    public function forceDelete($id)
    {
        $role = Role::withTrashed()->find($id);
        Gate::authorize('forceDelete', $role);
        $role->forceDelete();
        toastr()->positionClass('toast-top-center')->success('El rol a sido eliminado completamente.');

        return to_route('roles.index')->with('status','Role permanently deleted successfully');
    }

}
