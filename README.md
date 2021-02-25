## Installation instructions

###Follow the next steps:
- git clone git@github.com:turganbai/app-search.git
- cd app-search
- composer install
- cp .env.example .env
- php artisan key:generate
- in .env file set DB config (DB_DATABASE=laravel DB_USERNAME=root DB_PASSWORD=)
- php artisan migrate --seed
- php artisan serve
- http://127.0.0.1:8000/

- cd frontend
- yarn
- yarn dev
