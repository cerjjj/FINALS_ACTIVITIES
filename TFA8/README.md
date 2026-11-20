# TFA8: Locking It Down

TFA8 extends the POS app with Laravel resource controllers for customers and users, plus Breeze-style login and registration. Every customer and user resource route is protected by Laravel's `auth` middleware. The login uses Laravel's session guard, hashed passwords, session regeneration, CSRF protection, and request throttling.

## Requirements

- PHP 8.2 or newer with Laravel's required extensions and GD enabled for profile images
- Composer 2
- SQLite

The project targets Laravel 12 to match the previous activity's PHP 8.2 environment. `laravel/breeze` 2.x is included as a development dependency, along with the Intervention Image package used by TFA7.

This workspace could not reach Packagist while the project was being prepared. The auth controllers and views are included in the project source, but the Breeze package itself was not downloaded here, and there is no generated `composer.lock`. On an internet-connected machine, the first `composer install` resolves the declared dependencies and creates the lock file. The checked-in auth source is already configured, so do not rerun the Breeze installer over it.

## Run locally

From the `TFA8` folder:

```powershell
composer install
Copy-Item .env.example .env # only if .env does not already exist
php artisan key:generate # only if APP_KEY is empty
if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File database/database.sqlite | Out-Null }
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open `http://127.0.0.1:8000`. Create an account at `/register`, or sign in with a seeded demo account:

- Email: `mikaela@example.test`
- Password: `password`

The demo password is intentionally simple for local classroom use. Change it before using this app outside a local exercise. The sample data and credentials are fictional.

If Composer cannot resolve the Breeze or Intervention Image packages, make sure the machine has internet access and run `composer install` again. GD must be enabled in the PHP configuration used by Artisan and Composer. For XAMPP, enable `extension=gd` in `php.ini`, restart the terminal, then confirm `php -m` lists `gd`.

To reset the local sample database, run `php artisan migrate:fresh --seed`.

## Routes and access control

- Public: `/`, `/about`, `/login`, `/register`
- Protected: all seven conventional customer resource routes and all seven conventional user resource routes
- `POST /logout` ends the authenticated session

Unauthenticated requests to protected pages redirect to `/login`. Registration and login redirect into the overview after the session is established.

The resource controllers implement `index`, `create`, `store`, `show`, `edit`, `update`, and `destroy`. Forms validate server-side, preserve old values after validation errors, and use CSRF tokens. Avatar uploads retain the TFA7 workflow: a valid image up to 2 MB is cropped to a square JPEG and stored on Laravel's public disk.
