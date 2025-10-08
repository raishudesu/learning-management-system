<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
