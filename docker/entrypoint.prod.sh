#!/bin/bash

set -eo pipefail

if [[ ! -f ".env" ]]
then
    echo "Error: .env not found."
    exit 1
fi

if [[ ! -d "./storage" ]]
then
    mkdir -p ./storage/framework/{cache,sessions,views}
fi

composer install --no-dev

if [[ ! -f "./storage/oauth-private.key" ]]
then
    php artisan passport:install --force
fi

php artisan storage:link

php artisan migrate --force

/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf

exit 0
