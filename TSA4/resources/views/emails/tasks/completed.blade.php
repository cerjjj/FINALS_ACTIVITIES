<h1>Task completed</h1>

<p>The task <strong>{{ $task->title }}</strong> was marked done.</p>
<p>Scheduled for: {{ $task->task_date->format('M j, Y') }}</p>
<p>Task #{{ $task->id }}</p>
