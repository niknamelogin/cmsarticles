# Setup

`composer install`

`cp .env.example .env`

`php artisan key:generate`

`php artisan migrate`

`npm install && npm run dev`

`php artisan serve`

# Using

## WEB

DOMAIN/register - register new user

DOMAIN/articles - list articles

DOMAIN/articles/1 - one articles

DOMAIN/admin - filament admin

## API

get token
curl -X POST DOMAIN/api/login \
    -H "Content-Type: application/json" \
    -d '{"email": "USEREMAIL", "password": "PASSWORD"}'

Authorization: Bearer <token>

DOMAIN/api/articles

DOMAIN/api/articles/ID
