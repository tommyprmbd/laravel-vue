<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = auth()->user();


        // $user = User::where('id', 1)->first();
        // $user->assignRole('petugas');
        // $user->removeRole('petugas');

        $user = User::with('roles')->get();

        return $user;
    }
}
