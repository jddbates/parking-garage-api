# Parking Garage API

### SETUP
- PHP 7.1.14
- Laravel Framework 5.8.26
- `git clone git@github.com:jddbates/parking-garage-api.git`
- `cd parking-garage-api`
- set db connection in .env file `DB_CONNECTION=sqlite`
- create the sqlite file `touch database/database.sqlite`
- run migrations, this will also populate garage and rates tables `php artisan migrate`
- run database seeder to create sample tickets `php artisan db:seed`
- start local server with `php artisan serve`

### NOTES
- running the seeder refreshes the tickets table and creates 10 tickets that have random created_at timestamp within the last 9 hours
- there are only 12 parking spots
- only unpaid tickets take up a spot, its assumed someone pays as they are exiting
- available spots = total spots - unpaid tickets

# API Endpoints

### GET /api/garage
- shows garage details
### GET /api/rates
- get list of parking rates

### GET /api/tickets
- get list of tickets

### GET /api/ticket/1
- get individual ticket

### POST /api/ticket
- create a new ticket

### PUT /api/ticket/1/300
- pay a ticket, takes ticket id and an amount in cents

### DELETE /api/ticket/1
- delete a ticket, when exiting the parking garage, can only delete if ticket is paid
