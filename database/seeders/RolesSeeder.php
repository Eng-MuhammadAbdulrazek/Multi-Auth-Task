<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userPermission = Permission::where('slug', 'edit-self')->first();
        $adminPermission = Permission::where('slug', 'edit-users')->first();

        $userRole = new Role();
        $userRole->slug = 'client';
        $userRole->name = 'client Role';
        $userRole->save();
        $userRole->permissions()->attach($userPermission);

        $adminRole = new Role();
        $adminRole->slug = 'admin';
        $adminRole->name = 'Admin Role';
        $adminRole->save();
        $adminRole->permissions()->attach($adminPermission);
    }
}
