<p align="center"><img src="https://micaeldie.com/images/favicon.ico" width="400"></p>

## Project Laravel Authentification

### Requirements

---

-   PHP >= 7.1.3
-   PDO PHP extension
-   Laravel >= 5.8.x
-   JSON PHP extension
-   OpenSSL PHP extension
-   Tokenizer PHP extension
-   XML PHP extension
-   Mbstring PHP extension
-   Ctype PHP extension
-   BCMath PHP extension

### Set Database

-   Names in MySQL your database `laravel_auth` or whatever you want
-   Fill your file `.env` and make the config

### Run the App

-   Install dependencies `composer install`
-   Set a value for the APP_KEY variable, easy you can generate `php artisan key:generate`
-   Migrate database Run `php artisan migrate`
-   Run `php artisan db:seed` to run seeders, if any.
-   And run the local server `php artisan serve`

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Upgrade Guide, from 5.7 to 5.8.0](https://laravel.com/docs/5.8/upgrade)
-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
