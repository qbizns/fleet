#!/bin/bash

# run artisan scripts
pushd /var/www
    php artisan migrate:fresh --seed
    php artisan cache:clear
popd
