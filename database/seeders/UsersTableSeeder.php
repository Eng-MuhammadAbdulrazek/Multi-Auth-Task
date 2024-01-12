<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        $admin = new User();
		$admin->name = 'Administrator';
		$admin->email = 'admin@technostore.com';
		$admin->password = bcrypt('12345678');
        $admin->phone = '01014689548';
		$admin->save();

		$admin_role = Role::where('slug', 'admin')->first();
		$admin_perm = Permission::where('slug','edit-users')->first();

		if ($admin_role && $admin_perm) {
            $admin->roles()->attach($admin_role);
            $admin->permissions()->attach($admin_perm);
        } else {
            dd('Error');
        }
    }
}
