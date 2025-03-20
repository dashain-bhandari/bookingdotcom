<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $apartments=Apartment::get();
    $facilities=Facility::inRandomOrder()->get()->pluck('id')->toArray();
    foreach($apartments as $apartment){
        $apartment->facilities()
        ->sync(array_slice($facilities,0,random_int(1,count($facilities)-1)));
    }
   
    }
}
