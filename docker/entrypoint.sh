#!/bin/bash

set -eo pipefail

if [[ ! -f ".env" ]]
then
    echo "Warning: .env not found."
    su-exec nginx:nginx cp .env.example .env
fi

if [[ ! -d "./storage" ]]
then
    #su-exec nginx:nginx 
    mkdir -p ./storage/framework/{cache,sessions,views}
fi

#su-exec nginx:nginx
composer install --ignore-platform-req=ext-xdebug

if [[ ! -f "./storage/oauth-private.key" ]]
then
#    su-exec nginx:nginxx
    php artisan passport:install
fi

#su-exec nginx:nginx
php artisan storage:link
#su-exec nginx:nginx
php artisan migrate

/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf

exit 0
