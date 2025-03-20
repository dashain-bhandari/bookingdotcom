<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "owner" => $this->whenLoaded('owner', function(){
                return new UserResource($this->owner);
            }),
            "city" => $this->whenLoaded('city', function(){
                return new CityResource($this->city);
            }),
            "address_street" => $this->address_street,
            "address_postcode" => $this->whenHas('address_postcode'),
            "latitude" => $this->whenHas('lat'),
            "longitude" => $this->whenHas("lon"),
            "apartments" => $this->whenLoaded('apartments',  function () {
                return ApartmentResource::collection($this->apartments);
            }),
            "facilities" => $this->whenHas('facilities',$this->facilities),
        ];
    }
}
