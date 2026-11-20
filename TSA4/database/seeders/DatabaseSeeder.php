<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'jacer.castillo',
            'full_name' => 'Jacer Castillo',
            'email' => 'jacer.castillo@example.com',
            'password' => Hash::make('password'),
        ]);

        $today = now()->toDateString();
        $yesterday = now()->subDay()->toDateString();
        $tomorrow = now()->addDay()->toDateString();

        foreach ([
            ['title' => 'Reconcile yesterday’s cash drawer', 'status' => 'done', 'task_date' => $yesterday],
            ['title' => 'Review the weekly sales summary', 'status' => 'done', 'task_date' => $yesterday],
            ['title' => 'Prepare the morning register', 'status' => 'done', 'task_date' => $today],
            ['title' => 'Call the supplier about restock timing', 'status' => 'in progress', 'task_date' => $today],
            ['title' => 'Set up the afternoon promotion', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Receive and check the inventory delivery', 'status' => 'pending', 'task_date' => $tomorrow],
            ['title' => 'Post next week’s staff schedule', 'status' => 'pending', 'task_date' => $tomorrow],
            ['title' => 'Count bags and receipt paper', 'status' => 'pending', 'task_date' => $tomorrow],
        ] as $task) {
            Task::create($task);
        }
    }
}
