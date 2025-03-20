<?php

namespace App\Services;

use App\Actions\Apartment\CreateApartmentAction;
use App\Actions\Apartment\FindOneAction;
use App\Http\Resources\ApartmentDetailResource;
use App\Http\Resources\ApartmentResource;

class ApartmentService{
    public function createApartment($request){
        $apartment=CreateApartmentAction::handle($request);
        return new ApartmentResource($apartment);
    }

    public function findOne($apartment,$request){
        $apartment=FindOneAction::handle($apartment,$request);
        // return $apartment;
        return new ApartmentDetailResource($apartment);
    }
}