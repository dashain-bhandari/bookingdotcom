<?php

namespace App\Services;

use App\Actions\Auth\RegisterAction;
use App\Actions\Owner\CreatePropertyAction;
use App\Actions\Owner\FindAllAction;
use App\Actions\User\ShowPropertyAction;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\UserResource;

class PropertyService
{
    public function createProperty($request)
    {
        $property = CreatePropertyAction::handle($request);
        return new PropertyResource($property);
    }

    public function findAllProperties($request)
    {
        $properties = FindAllAction::handle($request);
        return  PropertyResource::collection($properties);
    }

    public function showProperty($property,$request){
$property=ShowPropertyAction::handle($property,$request);
print_r($property->id);
return new PropertyResource($property);
    }
}
