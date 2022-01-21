#!/bin/sh
RUN php /var/www/app/composer.phar install --working-dir=/var/www/app --no-dev --prefer-dist --no-scripts --no-progress --optimize-autoloader
