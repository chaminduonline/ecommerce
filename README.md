<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Ecommerce Project Setup

This repository contains the source code for an e-commerce project. Follow the instructions below to set up the project on your local development environment.

## Prerequisites

- Git installed on your system
- Composer installed on your system
- Node.js and npm installed on your system NodeJS v18.17.1 / npm v9.6.7
- PHP and Laravel installed on your system PHP 7.3 / Laravel 7
- A database server (e.g., MySQL) installed and running

## Installation

1. Clone the repository:

   ```bash
   git clone git@github.com:chaminduonline/ecommerce.git

2. Change to the project directory:

   ```bash
   cd ecommerce

3. Install PHP dependencies using Composer:
    
    ```bash
    composer install

4. Install JavaScript dependencies using npm:

    ```bash
    npm install

5. Compile assets using npm:

    ```bash
    npm run dev

6. Update the database configuration:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=your_database_host
    DB_PORT=your_database_port
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

7. Run database migrations to create tables:

    ```bash
    php artisan migrate

8. Seed the database with initial data

    ```bash
    php artisan db:seed


You can now start using the e-commerce project by running it on your local development server:

    php artisan serve


Visit http://localhost:8000 in your web browser to access the application.
