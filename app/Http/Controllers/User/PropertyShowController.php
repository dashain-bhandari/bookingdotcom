<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class PropertyShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(private PropertyService $propertyService){}
    public function __invoke(Property $property,Request $request)
    {
        return $this->propertyService->showProperty($property,$request);
    }
}
