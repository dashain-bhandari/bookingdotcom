<?php

namespace App\Http\Controllers\Apartment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apartment\StoreRequest;
use App\Models\Apartment;
use App\Services\ApartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApartmentController extends Controller
{
    public function __construct(private ApartmentService $apartmentService) {}
    public function store(StoreRequest $request)
    {
        Gate::authorize('properties-manage');
        return $this->apartmentService->createApartment($request->validated());
    }

    public function show(Apartment $apartment, Request $request){
        return $this->apartmentService->findOne($apartment,$request);
    }
}
