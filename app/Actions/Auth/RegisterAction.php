<?php

namespace App\Actions\Auth;

use App\Models\User;

class RegisterAction{
    public static function handle($request){
$user=User::create($request);
$token=$user->createToken('client')->plainTextToken;
$user->token=$token;
return $user;
    }
}