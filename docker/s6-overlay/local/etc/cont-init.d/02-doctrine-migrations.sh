#!/bin/sh
/var/www/app/bin/console --no-interaction doctrine:migrations:migrate --all-or-nothing --allow-no-migration
