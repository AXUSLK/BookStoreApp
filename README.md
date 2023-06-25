# OnlineBookStore

## Installation

Please check the official Laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Create a repository folder on your PC

    C:/onlineBookStore

Clone the repository inside the newly created repository folder ( C:/onlineBookStore )

    git clone https://github.com/AXUSLK/BookStoreApp.git . 

Install all the dependencies using the composer

    composer install
    
Install node modules using npm

    npm install

Copy the example env file and make the required configuration changes in the .env file

    copy .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**) [Environment variables](https://laravel.com/docs/10.x/sail#mysql)

    php artisan migrate
    
Run the database seeders 

    php artisan db:seed

Start the local development server

    php artisan serve
    npm run dev

You can now access the server at http://localhost:8000
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](https://laravel.com/docs/10.x/sail#mysql)

    php artisan migrate
    php artisan db:seed
    php artisan serve
    npm run dev
    
## Installed Packages

```
Laravel Breeze
IDE Helperr - barryvdh/laravel-ide-helper
```
