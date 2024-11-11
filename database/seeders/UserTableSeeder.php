<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //create data user
        User::create([
            'first_name'      => 'Admin',
            'last_name'      => 'istrator',
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin'),
            'role_id'  => 1,
        ]);

        //assign permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        $user = User::find(1);
        $user->assignRole('superadmin');
    }
}
