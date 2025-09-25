<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'name' => 'Home Page',
                'slug' => 'home',
                'is_active' => true,
            ],
            [
                'name' => 'About Us',
                'slug' => 'about-us',
                'is_active' => true,
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'is_active' => true,
            ],
            [
                'name' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'is_active' => false,
            ],
            [
                'name' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'is_active' => true,
            ],
        ];

        foreach ($pages as $pageData) {
            Page::create($pageData);
        }
    }
}
