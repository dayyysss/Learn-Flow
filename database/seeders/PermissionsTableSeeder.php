<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::create(['name' => 'dashboard', 'guard_name' => 'web']);
        // Permission::create(['name' => 'dashboard.index', 'guard_name' => 'web']);
        // Permission::create(['name' => 'dashboard.create', 'guard_name' => 'web']);
        // Permission::create(['name' => 'dashboard.update', 'guard_name' => 'web']);
        // Permission::create(['name' => 'dashboard.delete', 'guard_name' => 'web']);

        // Permission::create(['name' => 'artikel', 'guard_name' => 'web']);
        // Permission::create(['name' => 'artikel.index', 'guard_name' => 'web']);
        // Permission::create(['name' => 'artikel.create', 'guard_name' => 'web']);
        // Permission::create(['name' => 'artikel.update', 'guard_name' => 'web']);
        // Permission::create(['name' => 'artikel.delete', 'guard_name' => 'web']);

        // Permission::create(['name' => 'layanan', 'guard_name' => 'web']);
        // Permission::create(['name' => 'layanan.index', 'guard_name' => 'web']);
        // Permission::create(['name' => 'layanan.create', 'guard_name' => 'web']);
        // Permission::create(['name' => 'layanan.update', 'guard_name' => 'web']);
        // Permission::create(['name' => 'layanan.delete', 'guard_name' => 'web']);
    }
}