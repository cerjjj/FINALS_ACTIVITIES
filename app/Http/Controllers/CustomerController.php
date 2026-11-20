<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            ['id' => 'CUS-1001', 'name' => 'Amara Santos', 'email' => 'amara.santos@example.com', 'phone' => '+63 917 555 0101', 'status' => 'Active'],
            ['id' => 'CUS-1002', 'name' => 'Liam Reyes', 'email' => 'liam.reyes@example.com', 'phone' => '+63 917 555 0102', 'status' => 'Active'],
            ['id' => 'CUS-1003', 'name' => 'Sofia Cruz', 'email' => 'sofia.cruz@example.com', 'phone' => '+63 917 555 0103', 'status' => 'Active'],
            ['id' => 'CUS-1004', 'name' => 'Noah Garcia', 'email' => 'noah.garcia@example.com', 'phone' => '+63 917 555 0104', 'status' => 'Inactive'],
            ['id' => 'CUS-1005', 'name' => 'Isabella Lim', 'email' => 'isabella.lim@example.com', 'phone' => '+63 917 555 0105', 'status' => 'Active'],
        ];

        return view('pages.customers', compact('customers'));
    }
}
