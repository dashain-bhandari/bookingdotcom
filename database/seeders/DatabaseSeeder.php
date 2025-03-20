<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(GeoObjectSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(ApartmentTypeSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(BedTypeSeeder::class);
        $this->call(ApartmentSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BedSeeder::class);
        $this->call(FacilityCategorySeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(FacilityApartmentSeeder::class);
        $this->call(FacilityPropertySeeder::class);

    }
}
