<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\StorePropertyRequest;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private PropertyService $propertyService){}
    public function index(Request $request)
    {
        return $this->propertyService->findAllProperties($request);
    }

    public function store(StorePropertyRequest $request){
        Gate::authorize('properties-manage');
        return $this->propertyService->createProperty($request->validated());
    }

}
