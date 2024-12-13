#!/bin/sh

if [ ! -d "vendor" ]; then
  echo "Installing Composer"

#  Check if compose install
  if ! command -v composer &> /dev/null; then
    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer
  fi
   composer install
fi


if [ ! -f ".env" ] ||  ! grep -q . ".env" ; then
    cp .env.example .env
    php artisan key:generate --force
fi

/app/face_recognition/bin/pip install deepface tf-keras matplotlib

php artisan storage:link
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear

printenv > /etc/environment

php artisan migrate  --force --seed

php artisan icons:cache
php artisan config:cache

php artisan make:filament-user --name=$DEFAULT_USER --email=$DEFAULT_EMAIL --password=$DEFAULT_PASSWORD

php artisan octane:install --server=frankenphp

supervisord -c  /etc/supervisor/conf.d/supervisord.conf

