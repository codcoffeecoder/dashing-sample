#!/bin/sh
set -e
echo "Deploying application ..."
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true
    git fetch origin deploy
    git reset --hard origin/deploy
    composer install --no-interaction --prefer-dist --optimize-autoloader
    php artisan migrate --force
    php artisan optimize
    php artisan route:clear
php artisan up
echo "Application deployed!"
