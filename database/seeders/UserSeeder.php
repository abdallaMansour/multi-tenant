<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
        ]);

        $user->assignRole('Super Admin');

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $user->assignRole('Admin');

        $user = User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
        ]);

        $user->assignRole('Manager');

        $user = User::factory()->create([
            'name' => 'Tenant admin',
            'email' => 'tenantadmin@tenantadmin.com',
        ]);

        $user->givePermissionTo('create-tenant', 'read-tenant', 'update-tenant', 'delete-tenant');

        $user = User::factory()->create([
            'name' => 'Dev',
            'email' => 'dev@dev.com',
        ]);

        $user->assignRole('Super Admin');
    }
}
