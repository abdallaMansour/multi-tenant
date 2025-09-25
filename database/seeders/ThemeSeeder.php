<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
use App\Models\BusinessActivity;
use App\Models\Page;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some business activities and pages
        $businessActivities = BusinessActivity::where('is_active', true)->take(3)->get();
        $pages = Page::where('is_active', true)->take(5)->get();

        if ($businessActivities->isEmpty() || $pages->isEmpty()) {
            $this->command->warn('No business activities or pages found. Please seed them first.');
            return;
        }

        $themes = [
            [
                'business_activity_id' => $businessActivities->first()->id,
                'title' => 'Modern Business Theme',
                'features' => 'Responsive design, modern UI components, SEO optimized, mobile-friendly, fast loading',
                'price' => null,
                'is_active' => true,
            ],
            [
                'business_activity_id' => $businessActivities->skip(1)->first()->id ?? $businessActivities->first()->id,
                'title' => 'E-commerce Pro Theme',
                'features' => 'Shopping cart integration, payment gateway support, product catalog, order management',
                'price' => 149.99,
                'is_active' => true,
            ],
            [
                'business_activity_id' => $businessActivities->last()->id,
                'title' => 'Restaurant Theme',
                'features' => 'Menu display, online ordering, table reservation, customer reviews, delivery tracking',
                'price' => 79.99,
                'is_active' => true,
            ],
            [
                'business_activity_id' => $businessActivities->first()->id,
                'title' => 'Portfolio Theme',
                'features' => 'Gallery showcase, project portfolio, contact forms, blog integration, social media links',
                'price' => null, // Free theme
                'is_active' => false,
            ],
            [
                'business_activity_id' => $businessActivities->skip(1)->first()->id ?? $businessActivities->first()->id,
                'title' => 'Corporate Theme',
                'features' => 'Professional layout, team section, services showcase, testimonials, contact information',
                'price' => 129.99,
                'is_active' => true,
            ],
            [
                'business_activity_id' => $businessActivities->last()->id,
                'title' => 'Free Blog Theme',
                'features' => 'Clean blog layout, responsive design, SEO optimized, social sharing, comment system',
                'price' => null, // Free theme
                'is_active' => true,
            ],
        ];

        foreach ($themes as $themeData) {
            $theme = Theme::create($themeData);
            
            // Assign random pages to each theme
            $randomPages = $pages->random(rand(2, 4));
            $theme->pages()->attach($randomPages->pluck('id'));
        }
    }
}