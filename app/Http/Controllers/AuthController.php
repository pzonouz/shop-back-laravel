<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        $request->validated();
        User::create($request->only(['email', 'password']));
    }

    public function signin(SigninRequest $request)
    {
        $request->validated();
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            $access = $user->createToken('auth_token')->plainTextToken;
            $user->access = $access;
            return $user;
        };
    }
}
