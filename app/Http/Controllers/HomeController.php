<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userAll = User::all();
        $rolesAll = Role::all();  // Assuming you have a user authenticated using Laravel's built-in authentication system.
        $roles = $user->roles;
        return view('home', ['user' => $user, 'roles' => $roles, 'userAll' => $userAll, 'rolesAll' => $rolesAll]);
    }
}
