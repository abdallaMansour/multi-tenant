<?php

namespace Database\Seeders;

use App\Models\BusinessActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $businessActivity = BusinessActivity::create([
            'name' => 'E-commerce',
            'is_active' => true,
        ]);

        $businessActivity->addMedia(__DIR__ . '/media/business_activity/e-commerce.png')->preservingOriginal()->toMediaCollection();

        $businessActivity = BusinessActivity::create([
            'name' => 'Real Estate',
            'is_active' => true,
        ]);

        $businessActivity->addMedia(__DIR__ . '/media/business_activity/real_estate.png')->preservingOriginal()->toMediaCollection();

        $businessActivity = BusinessActivity::create([
            'name' => 'Health & Fitness',
            'is_active' => true,
        ]);

        $businessActivity->addMedia(__DIR__ . '/media/business_activity/health_and_Fitness.jpg')->preservingOriginal()->toMediaCollection();
    }
}
