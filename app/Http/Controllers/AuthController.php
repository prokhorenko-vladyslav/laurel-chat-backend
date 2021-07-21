<?php

namespace App\Http\Controllers;

use App\Actions\Auth\CurrentUserAction;
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\RegisterAction;
use App\Http\Requests\Auth\CurrentUserRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterAction $action)
    {
        $token = $action->run(
            $request->getDTO()
        );
        return response([
            'data' => [
                'token' => $token
            ]
        ]);
    }

    public function login(LoginRequest $request, LoginAction $action)
    {
        $token = $action->run(
            $request->getDTO()
        );
        return response([
            'data' => [
                'token' => $token
            ]
        ]);
    }

    public function logout(LogoutRequest $request, LogoutAction $action)
    {
        $action->run(
            $request->getDTO()
        );
    }

    public function current(CurrentUserRequest $request, CurrentUserAction $action): UserResource
    {
        $user = $action->run(
            $request->getDTO()
        );

        return new UserResource($user);
    }
}
