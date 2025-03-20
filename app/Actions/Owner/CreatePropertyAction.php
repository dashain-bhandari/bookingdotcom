<?php

namespace App\Actions\Owner;

use App\Models\Property;
use App\Models\User;

class CreatePropertyAction
{
    public static function handle($request)
    {
        $property = Property::create($request);
        return $property;
    }
}
