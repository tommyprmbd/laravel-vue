<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function test_spatie()
    {
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        
        // $user = User::with('roles')->get();
        // return $user;

        // membuat role yang sedang login
        // $user = auth()->user();
        // $user->assignRole('petugas');
        // return $user;
        
        // membuat role yang tidak login
        // $user = User::where('id', 2)->first();
        // $user->assignRole('petugas');
        // return $user;
        
        // menghapus role
        // $user = auth()->user();
        // $user->removeRole('petugas');

        // $user = User::where('id', 2)->first();
        // $user->removeRole('petugas');


    }
}
