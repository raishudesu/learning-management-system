<?php

namespace App\Services\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService  
{
    public function register(array $validated )
    {
        $user = new User($validated);
        
        $user->password = Hash::make($user->password);
       
        $role = Role::where('name', ucfirst($validated['role']))->firstOrFail();
        $user->role_id = $role->id;

        $user->save();
        
        return $user;
    }
}