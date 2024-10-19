<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\SigninAuthRequest;
use App\Http\Requests\Api\V1\SignupAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(SignupAuthRequest $request)
    {
        $request->validated();
        $user = User::create($request->all());

        return $user;
    }

    public function signin(SigninAuthRequest $request)
    {
        $request->validated();
        if (Auth::attempt($request->all())) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createtoken("token")->accessToken;
            return response()->json(["token" => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
