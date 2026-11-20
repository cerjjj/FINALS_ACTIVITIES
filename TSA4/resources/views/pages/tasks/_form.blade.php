<div class="field">
    <label for="title">Task title</label>
    <input id="title" name="title" type="text" value="{{ old('title', $task->title ?? '') }}" required maxlength="255" autofocus>
    @error('title')<p class="field-error">{{ $message }}</p>@enderror
</div>
<div class="field">
    <label for="status">Status</label>
    <select id="status" name="status" required>
        @foreach (['pending' => 'Pending', 'in progress' => 'In progress', 'done' => 'Done'] as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $task->status ?? 'pending') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('status')<p class="field-error">{{ $message }}</p>@enderror
</div>
<div class="field">
    <label for="task_date">Task date</label>
    <input id="task_date" name="task_date" type="date" value="{{ old('task_date', isset($task) ? $task->task_date->format('Y-m-d') : today()->format('Y-m-d')) }}" required>
    @error('task_date')<p class="field-error">{{ $message }}</p>@enderror
</div>
