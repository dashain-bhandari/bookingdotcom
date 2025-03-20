<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            'country'=>$this->whenLoaded('country', function(){
                return new CountryResource($this->country);
            }),
           'latitude'=>$this->whenHas('lat'),
           'longitude'=>$this->whenHas('lon')
        ];
    }
}
