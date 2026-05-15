<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'alicumralphgubrielle@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('alicumgub@23'),
                'is_admin' => true,
            ]
        );

        // Default social links - use updateOrCreate to avoid duplicate errors
        $socials = [
            ['platform' => 'facebook', 'url' => 'https://facebook.com/sawrap'],
            ['platform' => 'instagram', 'url' => 'https://instagram.com/sawrap.ph'],
            ['platform' => 'tiktok', 'url' => 'https://tiktok.com/@sawrap.ph'],
            ['platform' => 'email', 'url' => 'mailto:hello@sawrap.ph'],
        ];
        foreach ($socials as $social) {
            SocialLink::updateOrCreate(
                ['platform' => $social['platform']],
                ['url' => $social['url']]
            );
        }

        // Sample products - use firstOrCreate to avoid duplicates
        $products = [
            [
                'name' => 'Tocino & Rice',
                'description' => 'Sweet, caramelised pork tocino on a bed of warm steamed rice, all wrapped in a soft green herb tortilla.',
                'price' => 79,
                'badge' => 'Best Seller',
                'image' => 'products/tocino.jpg',
            ],
            [
                'name' => 'Bangus & Rice',
                'description' => 'Crispy, golden milkfish paired with fluffy rice — a timeless silog classic reimagined as a handy wrap.',
                'price' => 85,
                'badge' => 'Fan Favourite',
                'image' => 'products/bangus.jpg',
            ],
            [
                'name' => 'Longganisa & Rice',
                'description' => 'Juicy, garlicky Filipino sausage with a hint of sweetness, paired with rice in our signature green wrap.',
                'price' => 79,
                'badge' => 'New',
                'image' => 'products/longganisa.jpg',
            ],
        ];
        foreach ($products as $product) {
            Product::firstOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
