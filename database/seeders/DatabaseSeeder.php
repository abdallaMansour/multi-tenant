<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->clearDirectories();

        User::factory()->create([
            'name' => 'Dev',
            'email' => 'dev@dev.com',
        ]);

        $this->call([
            BusinessActivitySeeder::class,
        ]);
    }

    public function clearDirectories()
    {
        // Path to the storage/app/public directory
        $storagePath = storage_path('app/public');

        // Delete all folders inside the storage path
        $folders = File::directories($storagePath);

        foreach ($folders as $folder) {
            File::deleteDirectory($folder);
        }

        echo ('All folders in the storage path have been deleted.');
    }
}
