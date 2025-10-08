<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\RegisterService;
use Auth;

class RegisterController extends Controller
{
    protected RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = $this->registerService->register($validated);

        Auth::login($user);

        return redirect('/')->with('success', 'User registered successfully!');
    }
}
