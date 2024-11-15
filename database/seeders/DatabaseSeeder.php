<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Generate 100 customers
        for ($i = 0; $i < 1000; $i++) {
            $customerId = DB::table('customers')->insertGetId([
                'customer_name' => $faker->name,
                'customer_description' => $faker->paragraph,
            ]);

            // Generate random sales for the customer
            DB::table('sales')->insert([
                'customer_id' => $customerId,
                'total_sales' => $faker->randomFloat(2, 100, 10000), // Example: random sales between 100 and 10,000
                'created_at' => $faker->dateTimeBetween('-2 year', 'now'), // Random date within the last year
                'updated_at' => now()
            ]);

            // Generate a random customer address for the customer
            DB::table('customer_alamat')->insert([
                'customer_id' => $customerId,
                'customer_alamat' => $faker->address,
            ]);
        }
    }
}
