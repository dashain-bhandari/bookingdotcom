<?php

namespace App\Actions\User;

class ShowPropertyAction
{
    public static function handle($property, $request)
    {
       return $property->load(['apartments' => function ($q) use ($request) {
            $q->when($request['adults'], function ($q) use ($request) {
                $q->where('capacity_adults', '>=', $request['adults']);
            });
            $q->when($request['adults'], function ($q) use ($request) {
                $q->where('capacity_adults', '>=', $request['adults']);
            });
        },'apartments.facilities']);
    }
}
