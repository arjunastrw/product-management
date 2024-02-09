<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User; // Import model User
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil ID dari tiga pengguna pertama
        $userIds = User::pluck('id')->take(3)->toArray();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'user_id' => $userIds[array_rand($userIds)], // Pilih secara acak salah satu dari tiga ID pengguna
                'name_product' => $faker->words(2, true),
                'brand' => $faker->company,
                'stock' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}
