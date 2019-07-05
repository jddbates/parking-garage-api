# parking-garage-api

PHP 7.1.14
Laravel Framework 5.8.26

# set db connection in .env file
DB_CONNECTION=sqlite

# set sqlite database path in config/database.php

```
'sqlite' => [
    'driver' => 'sqlite',
    'url' => env('DATABASE_URL'),
    'database' => database_path('database.sqlite'),
    'prefix' => '',
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
],
```

# create the sqlite file
touch database/database.sqlite

# run migrations, this will also populate garage and rates tables
php artisan migrate

# run database seeder to create sample tickets
php artisan db:seed
# refreshes the tickets table and creates 10 tickets that have random created_at timestamp within the last 9 hours
