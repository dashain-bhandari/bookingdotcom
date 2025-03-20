<?php

namespace App\Actions\Owner;

use App\Models\GeoObject;
use App\Models\Property;

class FindAllAction
{
    public static function handle($request)
    {
        $query = Property::query()->with('city');
        $query->when($request->city, function ($q) use ($request) {
            $q->where('city_id', '=', $request->city);
        });
        $query->when($request->country, function ($q) use ($request) {
            $q->whereHas('city', function ($query) use ($request) {
                $query->where('country_id', $request->country);
            });
        });
        $query->when($request->geoObject, function ($q) use ($request) {
            $geoobject = GeoObject::find($request->geoObject);
            if ($geoobject) {
                $q->whereRaw(
                    '6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lon ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) )<1000',
                    [$geoobject->lat, $geoobject->lon, $geoobject->lat]
                )
                ;
                
            }
        });
        return $query->get();
    }
}
