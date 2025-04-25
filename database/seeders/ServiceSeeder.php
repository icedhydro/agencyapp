<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Webový vývoj',
                'slug' => 'webovy-vyvoj',
                'description' => 'Tvoříme moderní a rychlé webové stránky na míru vašim potřebám.'
            ],
            [
                'title' => 'Mobilní aplikace',
                'slug' => 'mobilni-aplikace',
                'description' => 'Vývoj nativních a multiplatformních mobilních aplikací pro iOS a Android.'
            ],
            [
                'title' => 'SEO optimalizace',
                'slug' => 'seo-optimalizace',
                'description' => 'Zvýšíme návštěvnost vašeho webu pomocí špičkové SEO optimalizace.'
            ],
            [
                'title' => 'Marketingové kampaně',
                'slug' => 'marketingove-kampane',
                'description' => 'Kompletní správa online marketingu od PPC po sociální sítě.'
            ],
            [
                'title' => 'Grafický design',
                'slug' => 'graficky-design',
                'description' => 'Vytvoříme vizuály, které vaši značku posunou na vyšší úroveň.'
            ],
            [
                'title' => 'Webhosting',
                'slug' => 'webhosting',
                'description' => 'Spolehlivý a rychlý hosting pro vaše webové stránky a aplikace.'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
