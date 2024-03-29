# UI For Laravel Fortify Using Windmill Dashboard

[![License](https://img.shields.io/github/license/Kamona-WD/fortify-windmill)](https://github.com/Kamona-WD/fortify-windmill/blob/main/LICENSE.md)
[![Release](https://img.shields.io/github/release/Kamona-WD/fortify-windmill)](https://github.com/Kamona-WD/fortify-windmill/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/kamona/fortify-windmill.svg)](https://packagist.org/packages/kamona/fortify-windmill)

Auth scaffolding for [laravel/fortify](https://github.com/laravel/fortify) using [Windmill-Dashboard](https://github.com/estevanmaito/windmill-dashboard) assets.

## Note

We recommend installing this package on a project that you are starting from scratch.

IF you want to use [laravel/ui](https://github.com/laravel/ui) check this repo [kamona/laravel-windmill-presets](https://github.com/Kamona-WD/laravel-windmill-presets) .

## Usage

1. Fresh install Laravel >= 8.0 and `cd` to your app.
2. Install this preset via `composer require kamona/fortify-windmill`. Laravel will automatically discover this package. No need to register the service provider,
   And also no need to install `laravel/fortify` it will be installed automatically.

3. Use `php artisan fortmill:install`.
      (NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in `routes/web.php` and run `npm install && npm run dev`)
4. Configure your favorite database (mysql, sqlite etc.)
5. Run `php artisan migrate`.
6. `npm install && npm run dev`
7. `php artisan serve`

## Note

All Fortify features are enabled by default except email verification. To enable it edit your `Models/User.php` model

```php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
   // ....
}
```

Uncomment this line in `app/Providers/FortifyWindmillServiceProvider.php`.

```php
public function boot()
    {
        // ...

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        // ....
    }
```

Uncomment this line in `config/fortify.php`.

```php
'features' => [
        // ...
        Features::emailVerification(),
        // ...
    ],
```

## Enable, Disable feature

See [laravel/fortify](https://github.com/laravel/fortify#readme) docs. and don't forget to disable, enable views in `app/Providers/FortifyWindmillServiceProvider.php`

## Edit views

Sidebar links `views/partials/sidebar/sidebar-content.blade.php`.

Sidebar header `views/partials/sidebar/sidebar-header.blade.php`.

Sidebar footer `views/partials/sidebar/sidebar-footer.blade.php`.

Navbar right links `views/partials/navbar/navbar-links.blade.php`.

Layouts `views/layouts`.

Profile `views/profile/edit.blade.php`.

Dashboard `views/home.blade.php`



### Screenshots

| Light                                                | Dark                                                |
| ---------------------------------------------------- | --------------------------------------------------- |
| ![Welcome Light](/screens/welcome-light.png)         | ![Welcome Dark](/screens/welcome-dark.png)          |
| ![Login Light](/screens/login-light.png)             | ![Login Dark](/screens/login-dark.png)              |
| ![Dashboard Light](/screens/home-light.png)          | ![Dashboard Dark](/screens/home-dark.png)           |
| ![Profile Light](screens/profile-light.png)          | ![Profile Dark](/screens/profile-dark.png)          |
| ![Profile Light](screens/profile-password-light.png) | ![Profile Dark](/screens/profile-password-dark.png) |
| ![Profile Light](screens/two-factor-light.png)       | ![Profile Dark](/screens/two-factor-dark.png)       |
