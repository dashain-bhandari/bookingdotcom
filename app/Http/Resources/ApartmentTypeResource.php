<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class ApartmentTypeResource extends BaseResource
{
    public function toArray(Request $request)
    {
        return [
            'name'=>$this->name
        ];
    }
}
