#!/bin/sh
php /var/www/app/composer.phar install --working-dir=/var/www/app --prefer-dist --no-scripts --no-progress --optimize-autoloader
