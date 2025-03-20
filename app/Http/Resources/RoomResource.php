<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class RoomResource extends BaseResource
{
    public function toArray(Request $request)
    {
        return [
            'name' => $this->name,
            'beds' => $this->whenLoaded('beds', BedResource::collection($this->beds))
        ];
    }
}
