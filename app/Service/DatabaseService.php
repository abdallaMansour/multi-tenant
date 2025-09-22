<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class DatabaseService
{
    public static function createTenantDatabase($tenant, $databaseCredential)
    {
        $tenantConfig = config('database.connections.tenant');
        $tenantConfig['database'] = $databaseCredential->db_name;
        $tenantConfig['username'] = $databaseCredential->db_user;
        $tenantConfig['password'] = $databaseCredential->db_password;
        $tenantConfig['log'] = true;
        $tenantConnectionName = 'tenant_' . $databaseCredential->db_name;
        config(["database.connections.$tenantConnectionName" => $tenantConfig]);
        session()->put('tenant_connection_name', $tenantConnectionName);

        $query = DB::connection($tenantConnectionName);

        $sql = 'CREATE DATABASE IF NOT EXISTS ' . $databaseCredential->db_name . ';';
        DB::unprepared($sql);


        self::refreshTenantDatabase($query, $databaseCredential->db_name);
        $sqlFilePath = storage_path('app/tenant.sql');
        $sqlContent = file_get_contents($sqlFilePath);
        $query->unprepared($sqlContent);

        $databaseCredential->update([
            'tenant_id' => $tenant->id
        ]);
    }


    public static function refreshTenantDatabase($query, $database)
    {
        // Disable foreign key checks temporarily
        $query->statement('SET FOREIGN_KEY_CHECKS=0');

        // Get the list of tables in the database
        $tables = $query->select("SHOW TABLES FROM {$database}");

        foreach ($tables as $table) {
            $table = reset($table); // Extract the table name from the result

            // Drop each table
            $query->statement("DROP TABLE IF EXISTS `{$table}`");
        }

        // Enable foreign key checks again
        $query->statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
