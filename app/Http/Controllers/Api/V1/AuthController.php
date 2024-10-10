<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function signin(SigninRequest $request)
    {
        if (\Auth::attempt($request->all())) {
            $user = \Auth::User();
            $success['token'] = $user->createToken('AuthToken')->accessToken;

            return response()->json([$success], 200);
        }

        return response()->json(['', 401]);
    }

    public function signup(SignupRequest $request)
    {
        $request->validated();
        $request['name'] = $request['email'];
        User::create($request->all());
    }

    public function signout($request)
    {
    }
}
