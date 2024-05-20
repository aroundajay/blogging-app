#!/bin/sh
# startup-script.sh

# Example command: migrate database
php artisan migrate

# Start the default command
php-fpm
