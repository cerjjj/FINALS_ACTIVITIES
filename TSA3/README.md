# TSA3 Tasks for Today

A Laravel task manager with a welcome page filtered to today's tasks, a complete task list, a profile page and an about page. It uses Eloquent models, query scopes, migrations, a seeder and Blade views.

## Requirements

- PHP 8.2 or newer with Laravel's required extensions
- Composer 2
- SQLite

This project uses Laravel 12 so it runs with PHP 8.2.

## Run locally

From the `TSA3` folder:

```powershell
composer install
Copy-Item .env.example .env # only if .env does not already exist
php artisan key:generate # only if APP_KEY is empty
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`. Pages: `/`, `/tasks`, `/profile`, and `/about`.

To reset the local sample database, run `php artisan migrate:fresh --seed`.

## Database schema

- `tasks`: title, status (defaults to `pending`), task_date and timestamps
- `users`: unique username, full_name, email and timestamps

The seeder creates eight fictional tasks across yesterday, today and tomorrow, plus exactly one user. Task dates are relative to the day you seed the database.

## Structure

- `app/Models/Task.php` defines `forDate` and `forToday` Eloquent scopes.
- `app/Http/Controllers/TaskController.php` shows only today's tasks on `/` and all tasks ordered by date on `/tasks`.
- `app/Http/Controllers/UserController.php` retrieves the one profile record for `/profile`.
- `resources/views/pages` contains the four Blade pages.

The About page identifies Jacer Castillo as the student developer. The email in the seeded profile is a fictional `example.com` address.
