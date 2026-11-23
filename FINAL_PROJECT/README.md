# Northstar Point-of-Sale System

A complete Laravel POS project in Laravel 12. Staff authenticate to manage products, customers, staff accounts, sales, and inventory. It includes validated CRUD, image uploads with display-ready GD thumbnails, and a transactional sale workflow.

## Requirements

- PHP 8.2 or newer with PDO SQLite (or PDO MySQL), Fileinfo, OpenSSL, and GD
- Composer 2

## Set up locally

From the FINAL_PROJECT folder, run:

    composer install
    Copy-Item .env.example .env # only if .env does not already exist
    php artisan key:generate # only when APP_KEY is empty
    if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File database/database.sqlite | Out-Null }
    php artisan migrate --seed
    php artisan storage:link
    php -d extension=C:\xampp\php\ext\php_gd.dll artisan serve --port=8010

Open http://127.0.0.1:8010. Demo staff sign-in:

- Email: mikaela@example.test
- Password: password

The seeded account and data are fictional and intended for local coursework only. Change the demo password before using the application beyond this exercise.

If GD is enabled in the active PHP php.ini, use the usual php artisan serve --port=8010 command. In XAMPP, enable GD by removing the semicolon from ;extension=gd in C:\xampp\php\php.ini, then open a fresh terminal and verify php -m includes gd.

## Features

- Product CRUD with required name, valid price, nonnegative inventory, and optional JPG, PNG, or WebP image upload up to 2 MB.
- Customer CRUD with required full name and valid email, plus optional phone.
- Staff CRUD with unique username and email, hashed passwords, and optional prepared avatar upload up to 2 MB.
- Product photos and staff avatars are decoded with GD, orientation-corrected for JPEG, center-cropped to square JPEG thumbnails, assigned generated names, and saved on Laravel's public disk. Only their storage paths are saved in the database.
- Sale form with optional customer and positive quantity. A transaction locks the selected product, checks stock, snapshots the current unit price in the sale total, inserts the sale, and decreases inventory atomically.
- Sales history shows product, customer or walk-in, staff member, quantity, total, and timestamp.
- Foreign keys protect sales records. Products or staff referenced by sales cannot be deleted; a customer can be removed and its historical sale reference becomes null.
- All POS management pages require a staff login. The About page and login/registration screens remain public.

## Database

Migrations create users, customers, products, and sales with the relationships shown in the project schema. The database seeder creates one demo staff account, five customers, and six products. Reset the local sample database with:

    php artisan migrate:fresh --seed

To use MySQL instead of SQLite, set DB_CONNECTION=mysql and the matching DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD in .env, then run the migrations and seeder.
