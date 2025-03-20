<?php

namespace App\Services;

use App\Actions\User\FindApartmentAction;
use App\Http\Resources\ApartmentResource;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertySearchResource;
use App\Models\Apartment;

class UserService
{
    public function findPropertyByNoOfGuests($request)
    {
        $apartments = FindApartmentAction::handle($request);
        return new PropertySearchResource($apartments);
    }
}
