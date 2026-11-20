<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('customer_accounts')->insert([
            ['account_code' => 'CUS-1001', 'name' => 'Amara Santos', 'email' => 'amara.santos@example.com', 'phone' => '+63 917 555 0101', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'CUS-1002', 'name' => 'Liam Reyes', 'email' => 'liam.reyes@example.com', 'phone' => '+63 917 555 0102', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'CUS-1003', 'name' => 'Sofia Cruz', 'email' => 'sofia.cruz@example.com', 'phone' => '+63 917 555 0103', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'CUS-1004', 'name' => 'Noah Garcia', 'email' => 'noah.garcia@example.com', 'phone' => '+63 917 555 0104', 'status' => 'Inactive', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'CUS-1005', 'name' => 'Isabella Lim', 'email' => 'isabella.lim@example.com', 'phone' => '+63 917 555 0105', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('user_accounts')->insert([
            ['account_code' => 'USR-2001', 'name' => 'Mikaela Tan', 'email' => 'mikaela.tan@example.com', 'role' => 'Administrator', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'USR-2002', 'name' => 'Ethan Dela Cruz', 'email' => 'ethan.delacruz@example.com', 'role' => 'Cashier', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'USR-2003', 'name' => 'Chloe Mendoza', 'email' => 'chloe.mendoza@example.com', 'role' => 'Inventory Clerk', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'USR-2004', 'name' => 'Lucas Flores', 'email' => 'lucas.flores@example.com', 'role' => 'Cashier', 'status' => 'Inactive', 'created_at' => $now, 'updated_at' => $now],
            ['account_code' => 'USR-2005', 'name' => 'Ava Navarro', 'email' => 'ava.navarro@example.com', 'role' => 'Manager', 'status' => 'Active', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
