#!/bin/sh
# startup-script.sh

# build the project
yarn build

# migrate database
php artisan migrate

# seed database
php artisan db:seed

# start the php-fpm process
php-fpm
