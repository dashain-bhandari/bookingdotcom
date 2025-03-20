<?php

namespace App\Services;

use App\Actions\Auth\RegisterAction;
use App\Http\Resources\UserResource;

class AuthService
{
    public function register($request)
    {
        $user = RegisterAction::handle($request);
        return new UserResource($user);
    }
}
