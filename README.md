# RILLC Take Home Test

Please use the code base to create a basic user management system with CRUD functionality. Use any packages or frameworks you are comformatable with, but be sure to use Eloquent models and Laravel controllers.

When you are done, or if you have questions - please submit a pull request with any information you want to include to the origin: https://github.com/immortaltako/dev_test.git

## Use Laravel Sail

[Laravel Sail](https://laravel.com/docs/8.x/sail), a first-class Docker solution for Laravel, is a dependency of this
project. If you would like to use Sail for your dev environment, here's what you'll need to run to get going (other than
getting Docker setup on your machine; see Sail Docs for prereq setup):

```bash
$ composer install --ignore-platform-reqs

# Setup your .env file.

$ ./vendor/bin/sail up -d
$ ./vendor/bin/sail artisan key:generate
$ ./vendor/bin/sail artisan migrate --seed
$ ./vendor/bin/sail npm install
$ ./vendor/bin/sail npm run dev
```

You should now be able to access the app via http://localhost.

You can change the port Sail uses for its web server with the `APP_PORT` env variable.

With Sail comes [MailHog](https://github.com/mailhog/MailHog). MailHog can be found running at: http://localhost:8025.

See Sail's documentation for instructions on how to use Sail: https://laravel.com/docs/8.x/sail

## Initialize the codebase

We use Composer to manage the server-side dependencies

```bash
$ composer install
```

We use NPM to manage the client-side dependencies

```bash
$ npm install
```

## Build the front-end

We use [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) to build the front-end.

```bash
$ npm run prod
```

The build config file is `./webpack.mix.js`.

## Setup your environment

Copy `./.env.example` to `./env`

Generate an app key:

```bash
$ php artisan key:generate
```

## Database initialization

We use Laravel's migrations to setup schema, and a core user experience data seeder is available to you so that you can
get up and running quickly.

```bash
$ php artisan migrate --seed
```

## Development workflow

Start the build watcher for the front-end:

```bash
$ npm run watch
```

Make changes, save, refresh the browser.

If you need to blow-away the database, just do a fresh migration:

```bash
$ php artisan migrate:fresh --seed
```

For debugging help, we have [Laravel's Telescope](https://laravel.com/docs/8.x/telescope) installed. You can access
Telescope via the `/telescope` route. (see `artisan route:list --name=telescope`)

## Third Party Dependencies

Optionally, get your own [BugSnag](https://www.bugsnag.com/) account. Create a project, and then put that project's API
key in `BUGSNAG_API_KEY`.
