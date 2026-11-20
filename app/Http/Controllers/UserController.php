<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['id' => 'USR-2001', 'name' => 'Mikaela Tan', 'email' => 'mikaela.tan@example.com', 'role' => 'Administrator', 'status' => 'Active'],
            ['id' => 'USR-2002', 'name' => 'Ethan Dela Cruz', 'email' => 'ethan.delacruz@example.com', 'role' => 'Cashier', 'status' => 'Active'],
            ['id' => 'USR-2003', 'name' => 'Chloe Mendoza', 'email' => 'chloe.mendoza@example.com', 'role' => 'Inventory Clerk', 'status' => 'Active'],
            ['id' => 'USR-2004', 'name' => 'Lucas Flores', 'email' => 'lucas.flores@example.com', 'role' => 'Cashier', 'status' => 'Inactive'],
            ['id' => 'USR-2005', 'name' => 'Ava Navarro', 'email' => 'ava.navarro@example.com', 'role' => 'Manager', 'status' => 'Active'],
        ];

        return view('pages.users', compact('users'));
    }
}
