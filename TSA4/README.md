# TSA4: Tasks for Today

A Laravel task manager based on TSA3. It includes task creation, details, editing, soft archiving, Breeze-style authentication, and a completion email notification. Welcome, task list, profile, and about pages are public. Only signed-in users can create, edit, or archive tasks.

## Requirements

- PHP 8.2 or newer with Laravel's required extensions
- Composer 2
- SQLite

This project uses Laravel 12 to match the PHP 8.2 environment from the earlier activities. `laravel/breeze` 2.x is declared as a development dependency.

## Run locally

From the `TSA4` folder:

```powershell
composer install
Copy-Item .env.example .env # only if .env does not already exist
php artisan key:generate # only if APP_KEY is empty
if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File database/database.sqlite | Out-Null }
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`. Log in with the local seeded account:

- Email: `jacer.castillo@example.com`
- Password: `password`

The sample account and password are for local classroom use only. The seeder uses fictional data.

## Email notifications

The default `.env.example` uses Laravel's `log` mail driver and the recipient `tasks@example.test`, so no real inbox is contacted. When a task changes from `pending` or `in progress` to `done`, the app sends a `TaskCompletedMail` to `TASK_COMPLETED_TO`. Updating a task that is already `done` does not send again. Inspect the generated message in `storage/logs/laravel.log`.

Set `TASK_COMPLETED_TO` to another address if desired. For SMTP, configure Laravel's standard `MAIL_*` variables in `.env`; never commit real credentials.

## Task behavior

- `/` shows today's active tasks; `/tasks` lists active tasks across dates.
- `/profile` and `/about` are public.
- `/tasks/{task}` shows task details publicly.
- `/tasks/create`, `/tasks/{task}/edit`, and task store/update/archive actions require authentication.
- Task input validates a required title (up to 255 characters), a supported status, and a valid date.
- Archiving sets `is_archived` to true. Archived records stay in the database and are excluded from ordinary task pages.

The seeder creates eight fictional tasks dated relative to seed time and one demo account. Run `php artisan migrate:fresh --seed` to reset the database.

## Package availability note

The authoring environment could not reach Packagist. Breeze is declared in `composer.json`, and the auth controllers and views are included, but the package was not downloaded here. No `composer.lock` is included; the first `composer install` on an internet-connected machine resolves the dependencies and creates it. The checked-in auth files are already configured, so do not rerun the Breeze installer over them.
