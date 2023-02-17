

# Installation Instructions 

## Prerequisites

* php 8.1
* composer
* mysql 8.1

## Installation
* copy .env.example to .env
* edit .env and set your database credentials
* run `composer install`
* webserver root should be the public folder
* run `php artisan migrate`
