<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'mikaela.tan',
            'full_name' => 'Mikaela Tan',
            'email' => 'mikaela@example.test',
            'password' => Hash::make('password'),
        ]);

        foreach ([
            ['full_name' => 'Amara Santos', 'email' => 'amara.santos@example.test', 'phone' => '+63 917 555 0101'],
            ['full_name' => 'Liam Reyes', 'email' => 'liam.reyes@example.test', 'phone' => '+63 917 555 0102'],
            ['full_name' => 'Sofia Cruz', 'email' => 'sofia.cruz@example.test', 'phone' => '+63 917 555 0103'],
            ['full_name' => 'Noah Garcia', 'email' => 'noah.garcia@example.test', 'phone' => '+63 917 555 0104'],
            ['full_name' => 'Isabella Lim', 'email' => 'isabella.lim@example.test', 'phone' => '+63 917 555 0105'],
        ] as $customer) {
            Customer::create($customer);
        }

        foreach ([
            ['name' => 'Classic T-Shirt', 'price' => '599.00', 'stock_quantity' => 18],
            ['name' => 'Canvas Tote Bag', 'price' => '249.00', 'stock_quantity' => 24],
            ['name' => 'Ceramic Mug', 'price' => '189.50', 'stock_quantity' => 12],
            ['name' => 'Notebook Set', 'price' => '159.00', 'stock_quantity' => 30],
            ['name' => 'Water Bottle', 'price' => '329.00', 'stock_quantity' => 15],
            ['name' => 'Desk Calendar', 'price' => '119.00', 'stock_quantity' => 10],
        ] as $product) {
            Product::create($product);
        }
    }
}
