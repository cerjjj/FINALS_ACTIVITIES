# Northstar POS Foundations

A four-page Laravel POS foundations activity. The home and about pages use `PageController`; customer and user account listings use their own controllers and Blade views. The two account pages intentionally read from static PHP arrays, as required by the exercise. Optional migrations and a seeder are included for the submission checklist and do not drive the page listings.

## Requirements

- PHP 8.2 or newer with the Laravel-required extensions
- Composer 2
- SQLite (included with this project configuration)

This project uses Laravel 12 so it runs with the PHP 8.2 version already installed on the development computer.

## Run locally

From this project folder:

```powershell
composer install
Copy-Item .env.example .env # only if .env does not already exist
php artisan key:generate # only if APP_KEY is empty
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`. The pages are `/`, `/about`, `/customers`, and `/users`.

To start over with a fresh local database, run `php artisan migrate:fresh --seed`. The `.env` file and generated SQLite database are local development files; do not publish secrets.

## Project structure

- `routes/web.php` — named routes for all four pages
- `app/Http/Controllers` — page, customer, and user controllers
- `resources/views/layouts/app.blade.php` — shared layout and navigation
- `resources/views/pages` — four Blade pages; account lists use `@foreach`
- `database/migrations` and `database/seeders` — optional relational schema and matching sample records

## Sample records

Both account controllers define five fictional records as static arrays. The migration and seeder create five matching customer records and five user records in `customer_accounts` and `user_accounts` if you need a database export for submission. The web pages continue to use the required arrays.

## Submission

GitHub repository: https://github.com/cerjjj/FINALS_ACTIVITIES

Hosting is not part of this activity submission.
