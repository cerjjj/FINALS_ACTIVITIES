# TFA7: Forms, Validation, and File Upload

This Laravel POS activity extends TFA6 with customer and user create/edit forms, server-side validation, unique usernames, and user profile image uploads. Uploaded images are cropped to 256 × 256 JPEGs and stored on Laravel's public disk; only the generated path is saved in the database.

## Requirements

- PHP 8.2 or newer with the GD extension enabled
- Composer 2
- SQLite

This project uses Laravel 12 for compatibility with PHP 8.2. Intervention Image Laravel 1.5 is configured as the image-processing package.

## Run locally

From the `TFA7` folder:

```powershell
composer install
Copy-Item .env.example .env # only if .env does not already exist
php artisan key:generate # only if APP_KEY is empty
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open `http://127.0.0.1:8000`. Visit `/customers` and `/users` to manage records. The root page shows the current database counts.

If Composer reports that Intervention Image is missing, run:

```powershell
composer require intervention/image-laravel:^1.5
```

The package must be downloaded from Packagist. Enable GD in the PHP configuration used by both Composer and Artisan (for XAMPP, uncomment `extension=gd` in `php.ini`), restart the terminal, and confirm `php -m` lists `gd`.

To reset the sample database, run `php artisan migrate:fresh --seed`.

## Included behavior

- Customer create and edit: required full name, valid email, optional phone.
- User create and edit: required full name and username, with username uniqueness enforced on both paths.
- User edit image: optional image file up to 2 MB. Intervention Image creates an orientation-corrected square JPEG, stored under `storage/app/public/avatars`; the database stores its path.
- User list: displays the stored avatar or `public/images/avatar-placeholder.svg`.
- The seeder supplies five fictional customers and five fictional users. No live credentials are included; `.env`, the SQLite database, and Composer dependencies are excluded from Git.
