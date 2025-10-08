<?php

namespace App\Services\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function register(array $validated)
    {
        $validated['password'] = Hash::make($validated['password']);

        $role = Role::where('name', ucfirst($validated['role']))->firstOrFail();

        $user = new User($validated);

        $user->role_id = $role->id;

        $user->save();

        return $user;
    }
}
