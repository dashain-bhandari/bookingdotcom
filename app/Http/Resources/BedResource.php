<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BedResource extends BaseResource
{
    public function toArray(Request $request)
    {
        return [
            'name'=>$this->name,
            'bed_type'=>$this->whenLoaded('bedType',new BedTypeResource($this->bedType))
        ];
    }
}