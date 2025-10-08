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

            switch ($request->user()->role_id) {
                case 1:
                    return redirect('/admin-dashboard')->with('success', 'Welcome Admin!');
                case 2:
                    return redirect('/teacher-dashboard')->with('success', 'Welcome Teacher!');
                case 3:
                    return redirect('/student-dashboard')->with('success', 'Welcome Student!');
                default:
                    return redirect('/')->with('error', 'Unauthorized');
            }
        }

        return back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->onlyInput('email');
    }
}
