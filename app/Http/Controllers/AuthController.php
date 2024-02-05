<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registrationForm()
    {
        return view('auth.registration');
    }

    public function registration(RegistrationRequest $request)
    {
        User::query()->create($request->validated());

        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors([
            'email' => 'Incorrect data',
        ])->withInput($request->validated());
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
