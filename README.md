# Coding Challenges

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone https://github.com/issabdo/coding-challenge.git

Switch to the repo folder

    cd coding-challenge

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Database seeding

Run the database seeder for create Categorys

    php artisan db:seed

# Code overview

## Dependencies

- [vuejs](https://github.com/vuejs) - For build user interfaces and Filtter Data
- [axios](https://github.com/axios/axios) - For to communicate with API

----------

# Testing Command For Create Product

Run the laravel development server

    php artisan serve

From CLI write , and add in the variables

    php artisan Productcomm
