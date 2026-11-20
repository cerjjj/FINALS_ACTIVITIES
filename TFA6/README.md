# TFA6 From Arrays to Eloquent

A four-page Laravel POS activity that replaces TFA5's static account arrays with database-backed Eloquent models. Migrations create the `customers` and `users` tables, a seeder inserts five sample records into each table, and the account controllers retrieve those records for their Blade views.

## Requirements

- PHP 8.2 or newer with Laravel's required extensions
- Composer 2
- SQLite

This project uses Laravel 12 to run with PHP 8.2.

## Run locally

From the `TFA6` folder:

```powershell
composer install
Copy-Item .env.example .env # only if .env does not already exist
php artisan key:generate # only if APP_KEY is empty
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`. Pages: `/`, `/about`, `/customers`, and `/users`.

To reset the sample database, run `php artisan migrate:fresh --seed`.

## Database design

- `customers`: `id`, `full_name`, `email`, `phone`, timestamps
- `users`: `id`, unique `username`, `full_name`, timestamps

`Customer` and `User` Eloquent models represent their tables. `CustomerController` and `UserController` query those models, and the Blade pages use `@foreach` to render the returned collections.

The seeder creates five fictional customers and five fictional users. No live credentials are included; `.env`, the SQLite database, and Composer dependencies are excluded from Git.
