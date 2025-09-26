<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Basic',
                'is_active' => true,
                'trial_days' => 7,
                'plan' => 'monthly',
                'price' => 10,
                'features' => ['Basic features','20 GB Storage','10 GB Bandwidth','10 GB Storage','10 GB Storage'],
            ],
            [
                'name' => 'Pro',
                'is_active' => true,
                'trial_days' => 7,
                'plan' => 'monthly',
                'price' => 20,
                'features' => ['Pro features','20 GB Storage','10 GB Bandwidth','10 GB Storage','10 GB Storage'],
            ],
            [
                'name' => 'Enterprise',
                'is_active' => true,
                'trial_days' => 7,
                'plan' => 'monthly',
                'price' => 30,
                'features' => ['Enterprise features','20 GB Storage','10 GB Bandwidth','10 GB Storage','10 GB Storage'],
            ],
            [
                'name' => 'Yearly',
                'is_active' => true,
                'trial_days' => 7,
                'plan' => 'yearly',
                'price' => 100,
                'features' => ['Yearly features','20 GB Storage','10 GB Bandwidth','10 GB Storage','10 GB Storage'],
            ],
            [
                'name' => 'Test name',
                'is_active' => true,
                'trial_days' => 7,
                'plan' => 'yearly',
                'price' => 100,
                'features' => ['Free features','20 GB Storage','10 GB Bandwidth','10 GB Storage','10 GB Storage'],
            ],
            [
                'name' => 'Test name 2',
                'is_active' => true,
                'trial_days' => 7,
                'plan' => 'yearly',
                'price' => 100,
                'features' => ['Free features','20 GB Storage','10 GB Bandwidth','10 GB Storage','10 GB Storage'],
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
