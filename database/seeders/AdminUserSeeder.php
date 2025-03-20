<?php

namespace Database\Seeders;

use App\Models\User;
use App\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'super-admin@gmail.com',
            'password'=>'super-admin',
            'role_id'=>RoleEnum::ADMIN
        ]);
        User::create([
            'name'=>'owner',
            'email'=>'sowner@gmail.com',
            'password'=>'sowner',
            'role_id'=>RoleEnum::OWNER
        ]);
        User::create([
            'name'=>'dashu',
            'email'=>'dashu@gmail.com',
            'password'=>'dashu',
            'role_id'=>RoleEnum::USER
        ]);
    }
}
