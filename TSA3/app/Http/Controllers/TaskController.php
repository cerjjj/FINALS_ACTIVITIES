<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function today()
    {
        $tasks = Task::query()
            ->forToday()
            ->orderBy('id')
            ->get();

        return view('pages.home', compact('tasks'));
    }

    public function index()
    {
        $tasks = Task::query()
            ->orderBy('task_date')
            ->orderBy('id')
            ->get();

        return view('pages.tasks', compact('tasks'));
    }
}
