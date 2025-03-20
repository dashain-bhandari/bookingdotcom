<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('bookings-manage');
    }
}
