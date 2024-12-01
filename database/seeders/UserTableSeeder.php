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
            'first_name'=> 'Admin',
            'last_name' => 'istrator',
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin'),
            'role_id'   => 1,
        ]);

        User::create([
            'first_name'=> 'Hilal',
            'last_name' => 'Ahmad',
            'name'      => 'Hilal',
            'email'     => 'lalxmilo@gmail.com',
            'password'  => bcrypt('12345678'),
            'role_id'   => 2,
        ]);

        User::create([
            'first_name'=> 'ins',
            'last_name' => 'truktur',
            'name'      => 'instruktur',
            'email'     => 'instruktur@gmail.com',
            'password'  => bcrypt('instruktur'),
            'role_id'   => 3,
        ]);

        //assign permission to role
        $role = Role::find(1);
        $user = User::find(1);
        $user->assignRole('superadmin');
        
        $role = Role::find(2);
        $user = User::find(2);
        $user->assignRole('student');

        $role = Role::find(3);
        $user = User::find(3);
        $user->assignRole('instructor');
        
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
    }
}
