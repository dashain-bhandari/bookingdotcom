<?php

namespace Database\Seeders;

use App\Models\GeoObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeoObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Geoobject::create([
            'city_id' => 1,
            'name' => 'Statue of Liberty',
            'lat' => 40.689247,
            'lon' => -74.044502
        ]);
 
        Geoobject::create([
            'city_id' => 2,
            'name' => 'Big Ben',
            'lat' => 51.500729,
            'lon' => -0.124625
        ]);
    }
}
