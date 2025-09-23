<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all CRUD permissions for each section
        $permissions = [
            // Tenant Management
            'create-tenant',
            'read-tenant',
            'update-tenant',
            'delete-tenant',
            'show-tenant',

            // User Management
            'create-user',
            'read-user',
            'update-user',
            'delete-user',
            'show-user',

            // Role Management
            'create-role',
            'read-role',
            'update-role',
            'delete-role',
            'show-role',

            // Permission Management
            'create-permission',
            'read-permission',
            'update-permission',
            'delete-permission',
            'show-permission',

            // Business Activity Management
            'create-business-activity',
            'read-business-activity',
            'update-business-activity',
            'delete-business-activity',
            'show-business-activity',

            // Business Activity Requirements Management
            'create-business-activity-requirement',
            'read-business-activity-requirement',
            'update-business-activity-requirement',
            'delete-business-activity-requirement',
            'show-business-activity-requirement',

            // Database Credentials Management
            'create-database-credentials',
            'read-database-credentials',
            'update-database-credentials',
            'delete-database-credentials',
            'show-database-credentials',

            // Settings Management
            'create-setting',
            'read-setting',
            'update-setting',
            'delete-setting',
            'show-setting',

            // Dashboard Access
            'access-dashboard',
            'access-admin-panel',
            'access-tenant-panel',

            // Reports
            'view-reports',
            'export-reports',
            'generate-reports',

            // System Management
            'manage-system',
            'view-logs',
            'manage-backups',
            'system-maintenance',

            // File Management
            'upload-files',
            'download-files',
            'delete-files',
            'manage-files',

            // Email Management
            'send-emails',
            'view-emails',
            'manage-email-templates',

            // Notification Management
            'send-notifications',
            'view-notifications',
            'manage-notifications',

            // Audit Management
            'view-audit-logs',
            'export-audit-logs',
            'manage-audit-settings',

            // Configuration Management
            'view-configuration',
            'update-configuration',
            'manage-configuration',

            // Security Management
            'manage-security-settings',
            'view-security-logs',
            'manage-user-sessions',

            // Backup Management
            'create-backup',
            'restore-backup',
            'delete-backup',
            'view-backup-logs',

            // Maintenance Management
            'system-maintenance',
            'clear-cache',
            'optimize-database',
            'view-system-status',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        $this->command->info('Permissions seeded successfully!');
    }
}
