## Laraboard

Laraboard attempts to provide an easy to use, feature rich, Laravel powered forum package.

It is currently under heavy development and not recommended for production environments.

## Installation

### Composer

Require this package with composer:

```
composer require christhompsontldr/laraboard
```

### Service Provider

After updating composer, add the ServiceProvider to the providers array in config/app.php

#### Laravel 5.x:

```
Christhompsontldr\Laraboard\ServiceProvider::class,
```

### Migrations

The migrations tag is the only required tag.

Copy the package migrations to your local config with the publish command:

```
php artisan vendor:publish --provider="Christhompsontldr\Laraboard\ServiceProvider" --tag=migrations
```

Run the migration files

```
php artisan migrate
```

The other tags that are available are

 - views - if you want to overwrite the views
 - config - allowing you to config the forums
 - seeds - for seeding test data

### Models

Laraboard utilizes a model trait that you will need to add to your user model.

```
use Christhompsontldr\Laraboard\Models\Traits\LaraboardUser;

class User extends Authenticatable
{
    use LaraboardUser;
```

### Design

Laravel blade stacks are utilized to include required JS and CSS.

Please include this in the <head> of your main layout:

```
@stack('styles')
```

and this near appove </body>

```
@stack('scripts')
```

## Dependencies

### Middleware
Laraboard uses the stock Laravel middelware group `web`.

### Auth
Laraboard utilizes Laravel's built in Authentication and Authorization systems.

### Blades
Laraboard uses [Bootstrap](https://getbootstrap.com/] for styling and DOM structure.

### HTML & Forms
The [Laravel Collective](https://laravelcollective.com/) package is utilizes for building HTML and forms.  If you aren't already using it, no worries, Laraboard will install it.

### Private Messaging
If you have [Lavavel Messenger](https://github.com/cmgmyr/laravel-messenger) installed, it will be used for private messaging.