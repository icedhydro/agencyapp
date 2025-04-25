<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['title' => 'Webový vývoj', 'slug' => 'webovy-vyvoj'],
            ['title' => 'Mobilní aplikace', 'slug' => 'mobilni-aplikace'],
            ['title' => 'SEO optimalizace', 'slug' => 'seo-optimalizace'],
            ['title' => 'Marketingové kampaně', 'slug' => 'marketingove-kampane'],
            ['title' => 'Grafický design', 'slug' => 'graficky-design'],
            ['title' => 'Webhosting', 'slug' => 'webhosting']
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
