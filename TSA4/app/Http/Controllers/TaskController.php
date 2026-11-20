<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompletedMail;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function today(): View
    {
        $tasks = Task::query()->forToday()->orderBy('id')->get();

        return view('pages.home', compact('tasks'));
    }

    public function index(): View
    {
        $tasks = Task::query()->orderBy('task_date')->orderBy('id')->get();

        return view('pages.tasks', compact('tasks'));
    }

    public function create(): View
    {
        return view('pages.tasks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Task::create($this->validatedTask($request));

        return to_route('tasks.index')->with('success', 'Task created.');
    }

    public function show(Task $task): View
    {
        return view('pages.tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('pages.tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $previousStatus = $task->status;
        $task->update($this->validatedTask($request));

        if ($previousStatus !== 'done' && $task->status === 'done') {
            Mail::to(config('tasks.completed_recipient'))->send(new TaskCompletedMail($task));
        }

        return to_route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->is_archived = true;
        $task->save();

        return to_route('tasks.index')->with('success', 'Task archived.');
    }

    private function validatedTask(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['pending', 'in progress', 'done'])],
            'task_date' => ['required', 'date'],
        ]);
    }
}
