<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = Facility::where('category_id', null)->pluck('id')->toArray();
        $properties = Property::all();
        foreach ($properties as $property) {
            $property->facilities()->attach(array_slice($facilities, random_int(0, count($facilities) - 1)));
        }
    }
}
