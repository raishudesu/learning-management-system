<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->onlyInput('email');
    }
}
