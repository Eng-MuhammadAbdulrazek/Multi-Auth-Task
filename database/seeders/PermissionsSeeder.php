<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editSelfPermission = new Permission();
        $editSelfPermission->slug = 'edit-self';
        $editSelfPermission->name = 'Edit Self';
        $editSelfPermission->save();

        $editUsersPermission = new Permission();
        $editUsersPermission->slug = 'edit-users';
        $editUsersPermission->name = 'Edit Users';
        $editUsersPermission->save();
    }
}
