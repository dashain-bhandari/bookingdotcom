<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "properties-manage" => RoleEnum::OWNER,
            "bookings-manage" => RoleEnum::USER,
        ];
        foreach ($permissions as $permission => $role) {
            $role = Role::find($role);
            $permission = Permission::create([
                "name" => $permission
            ]);
            $role->permissions()->attach($permission->id);
        }
    }
}
