<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all CRUD permissions for each module
        $permissions = [
            // Tenant Management
            'create-tenant',
            'read-tenant',
            'update-tenant',
            'delete-tenant',

            // Admin Management
            'create-admin', // admin is in the users table
            'read-admin',
            'update-admin',
            'delete-admin',

            // Role Management
            'create-role',
            'read-role',
            'update-role',
            'delete-role',

            // Permission Management
            'create-permission',
            'read-permission',
            'update-permission',
            'delete-permission',

            // Page Management
            'create-page',
            'read-page',
            'update-page',
            'delete-page',

            // Business Activity Management
            'create-business_activity',
            'read-business_activity',
            'update-business_activity',
            'delete-business_activity',

            // Business Activity Requirements Management
            'create-business_activity_requirement',
            'read-business_activity_requirement',
            'update-business_activity_requirement',
            'delete-business_activity_requirement',

            // Database Credentials Management
            'create-database_credential',
            'read-database_credential',
            'update-database_credential',
            'delete-database_credential',

            // Theme Management
            'create-theme',
            'read-theme',
            'update-theme',
            'delete-theme',

            // Settings Management
            // 'create-setting',
            // 'read-setting',
            // 'update-setting',
            // 'delete-setting',

            // Dashboard Access
            // 'access-dashboard',
            // 'access-admin-panel',

            // Reports
            // 'view-reports',
            // 'export-reports',

            // System Management
            // 'manage-system',
            // 'view-logs',
            // 'manage-backups',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create default roles
        $this->createDefaultRoles();
    }

    /**
     * Create default roles with permissions
     */
    private function createDefaultRoles(): void
    {
        // Super Admin - Has all permissions
        $superAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin - Has most permissions except system management
        $admin = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $admin->givePermissionTo([
            'create-tenant', 'read-tenant', 'update-tenant', 'delete-tenant',
            'create-admin', 'read-admin', 'update-admin', 'delete-admin',
            'create-role', 'read-role', 'update-role', 'delete-role',
            'create-permission', 'read-permission', 'update-permission', 'delete-permission',
            'create-page', 'read-page', 'update-page', 'delete-page',
            'create-business_activity', 'read-business_activity', 'update-business_activity', 'delete-business_activity',
            'create-business_activity_requirement', 'read-business_activity_requirement', 'update-business_activity_requirement', 'delete-business_activity_requirement',
            'create-database_credential', 'read-database_credential', 'update-database_credential', 'delete-database_credential',
            // 'create-setting', 'read-setting', 'update-setting', 'delete-setting',
            // 'access-dashboard', 'access-admin-panel',
            // 'view-reports', 'export-reports',
        ]);

        // Manager - Has limited permissions
        $manager = Role::create(['name' => 'Manager', 'guard_name' => 'web']);
        $manager->givePermissionTo([
            'read-tenant', 'update-tenant',
            'read-admin', 'update-admin',
            'read-role', 'read-permission',
            'read-page', 'update-page',
            'read-business_activity', 'update-business_activity',
            'read-business_activity_requirement', 'update-business_activity_requirement',
            'read-database_credential',
            // 'read-setting', 'update-setting',
            // 'access-dashboard',
            // 'view-reports',
        ]);

        // User - Has basic permissions
        $user = Role::create(['name' => 'User', 'guard_name' => 'web']);
        $user->givePermissionTo([
            'read-tenant',
            'read-admin',
            'read-page',
            'read-business_activity',
            'read-business_activity_requirement',
            // 'read-setting',
            // 'access-dashboard',
        ]);

        // Guest - Has minimal permissions
        // $guest = Role::create(['name' => 'Guest', 'guard_name' => 'web']);
        // $guest->givePermissionTo([
        //     'access-dashboard',
        // ]);
    }
}
