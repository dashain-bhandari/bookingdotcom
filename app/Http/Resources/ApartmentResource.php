<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class ApartmentResource extends BaseResource
{

    public function toArray(Request $request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "capacity_adults" => $this->capacity_adults,
            "capacity_children" => $this->capacity_children,
            'type' => $this->whenLoaded('apartmentType', function () {
                return $this->apartmentType?->name;
            }),
            'beds_list' => $this->whenLoaded('beds', function () {
                return $this->bed_lists;
            }),
            'facilities' => $this->whenLoaded('facilities', function () {
                return $this->facilities;
            })
        ];
    }
}
