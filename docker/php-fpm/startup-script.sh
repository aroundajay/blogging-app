#!/bin/sh
# startup-script.sh

# Install PHP dependencies using Composer
composer install --optimize-autoloader

# Build frontend assets using Yarn
yarn install --frozen-lockfile

# build the project
yarn build

# migrate database
php artisan migrate

# seed database
php artisan db:seed

# start the php-fpm process
php-fpm
