FROM php:8.0.14-fpm-alpine3.15 as base

RUN mv /var/www/html /var/www/app
WORKDIR /var/www/app

# install s6 overlay
ADD https://github.com/just-containers/s6-overlay/releases/download/v2.2.0.1/s6-overlay-amd64-installer /tmp/
RUN chmod +x /tmp/s6-overlay-amd64-installer && /tmp/s6-overlay-amd64-installer /
COPY docker/s6-overlay/etc /etc
ENV S6_KEEP_ENV=1;
ENV S6_BEHAVIOUR_IF_STAGE2_FAILS=2;
ENV S6_SYNC_DISKS=1;

RUN apk update && \
    apk add nginx=1.20.2-r0

# clean up any deafault configurationS
RUN rm /etc/nginx/http.d/*

FROM base as composer-base
RUN curl https://getcomposer.org/download/2.2.3/composer.phar -o composer.phar
COPY app/composer.lock app/composer.json /var/www/app/
RUN php composer.phar install --working-dir=/var/www/app --no-dev --prefer-dist --no-scripts --no-progress --optimize-autoloader

FROM composer-base as prod-dependencies
RUN php composer.phar install --working-dir=/var/www/app --no-dev --prefer-dist --no-scripts --no-progress --optimize-autoloader

FROM base as local
COPY docker/local/nginx/shopper.conf /etc/nginx/http.d
COPY app/ /var/www/app

COPY --from=composer-base /var/www/app/composer.phar /var/www/app
RUN php composer.phar install --working-dir=/var/www/app --prefer-dist --no-scripts --no-progress --optimize-autoloader
ENTRYPOINT ["/init"]

