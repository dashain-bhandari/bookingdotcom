<?php

namespace App\Actions\User;

use App\Models\Apartment;
use App\Models\Facility;
use App\Models\Property;

class FindApartmentAction
{
    public static function handle($request)
    {
        $query = Property::query()->with([
            'apartments.apartmentType',
            'apartments.rooms.beds.bedType',
            'facilities'
        ]);
        $query->when(isset($request['adults']), function ($q) use ($request) {
            $q->withWhereHas('apartments', function ($q) use ($request) {
                // $q->where('id', 1);
                $q->where('capacity_adults', '>=', $request['adults']);
            });
        });
        $query->when(isset($request['children']), function ($q) use ($request) {
            $q->withWhereHas('apartments', function ($q) use ($request) {
                $q->where('capacity_children', '>=', $request['children']);
            });
        });
        $properties = $query->get();
        // return $properties;
    //     $facilities = $properties->pluck('facilities')->flatten();
    //    return $facilities->unique('name')->mapWithKeys(function ( $item, $key) use ($properties) {
    //         return [$item['name'] =>  $properties->filter(fn ($property) => $property->facilities->contains('name', $item->name))->count()];
    //     })->dd();

    $facilities = Facility::query()->where('category_id',null)
    ->withCount(['properties' => function ($property) use ($properties) {
        $property->whereIn('properties.id', $properties->pluck('id')->toArray());
    }])
    ->get()
    ->where('properties_count','>',0)
    ->pluck('properties_count','name');
 return collect(['properties'=>$properties,'facilities'=>$facilities]);
    }
}
