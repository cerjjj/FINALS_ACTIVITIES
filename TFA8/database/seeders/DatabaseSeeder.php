<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['full_name' => 'Amara Santos', 'email' => 'amara.santos@example.com', 'phone' => '+63 917 555 0101'],
            ['full_name' => 'Liam Reyes', 'email' => 'liam.reyes@example.com', 'phone' => '+63 917 555 0102'],
            ['full_name' => 'Sofia Cruz', 'email' => 'sofia.cruz@example.com', 'phone' => '+63 917 555 0103'],
            ['full_name' => 'Noah Garcia', 'email' => 'noah.garcia@example.com', 'phone' => '+63 917 555 0104'],
            ['full_name' => 'Isabella Lim', 'email' => 'isabella.lim@example.com', 'phone' => '+63 917 555 0105'],
        ] as $customer) {
            Customer::create($customer);
        }

        foreach ([
            ['username' => 'mikaela.tan', 'full_name' => 'Mikaela Tan', 'email' => 'mikaela@example.test'],
            ['username' => 'ethan.delacruz', 'full_name' => 'Ethan Dela Cruz', 'email' => 'ethan@example.test'],
            ['username' => 'chloe.mendoza', 'full_name' => 'Chloe Mendoza', 'email' => 'chloe@example.test'],
            ['username' => 'lucas.flores', 'full_name' => 'Lucas Flores', 'email' => 'lucas@example.test'],
            ['username' => 'ava.navarro', 'full_name' => 'Ava Navarro', 'email' => 'ava@example.test'],
        ] as $user) {
            User::create([...$user, 'password' => Hash::make('password')]);
        }
    }
}
