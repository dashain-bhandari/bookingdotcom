<?php

namespace App\Actions\Apartment;

class FindOneAction
{
    public static function handle($apartment, $request)
    {
        $apartment=$apartment->load([
            'beds',
            'facilities.category'
        ]);
        return $apartment;
    }
}
