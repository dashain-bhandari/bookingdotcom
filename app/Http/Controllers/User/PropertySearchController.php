<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PropertySearchRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class PropertySearchController extends Controller
{
    public function __construct(private UserService $userService){}
    public function index(PropertySearchRequest $request){
        return $this->userService->findPropertyByNoOfGuests($request->validated());
    }
}
