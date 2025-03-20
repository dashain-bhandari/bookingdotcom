<?php 
namespace App\Actions\Apartment;

use App\Models\Apartment;

class CreateApartmentAction{
    public static function handle($request){
        return Apartment::create($request);
    }
}