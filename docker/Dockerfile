FROM php:8.0.14-fpm-alpine3.15 as base

RUN mv /var/www/html /var/www/app
WORKDIR /var/www/app

# install s6 overlay
ADD https://github.com/just-containers/s6-overlay/releases/download/v2.2.0.1/s6-overlay-amd64-installer /tmp/
RUN chmod +x /tmp/s6-overlay-amd64-installer && /tmp/s6-overlay-amd64-installer /

ENV S6_KEEP_ENV=1;
ENV S6_BEHAVIOUR_IF_STAGE2_FAILS=2;
ENV S6_SYNC_DISKS=1;

RUN apk update && \
    apk add nginx=1.20.2-r0

# clean up any default configuration
RUN rm /etc/nginx/http.d/*

FROM base as composer-base
RUN curl https://getcomposer.org/download/2.2.3/composer.phar -o composer.phar
COPY app/composer.lock app/composer.json /var/www/app/

FROM composer-base as prod-dependencies
RUN php composer.phar install --working-dir=/var/www/app --no-dev --prefer-dist --no-scripts --no-progress --optimize-autoloader

FROM base as local
# copy startup scripts
COPY docker/s6-overlay/local/etc /etc

COPY docker/nginx/local/servis.conf /etc/nginx/http.d
COPY app/ /var/www/app

ENTRYPOINT ["/init"]

FROM base as prod
# copy startup scripts
COPY docker/s6-overlay/production/etc /etc
COPY docker/nginx/production/servis.conf /etc/nginx/http.d

COPY --from=prod-dependencies /var/www/app/vendor /var/www/app/vendor

#ccopy only whats neccesary
COPY app/public /var/www/app/public
COPY app/bin /var/www/app/bin
COPY app/config /var/www/app/config
COPY app/src /var/www/app/src
COPY app/.env /var/www/app/

ENTRYPOINT ["/init"]
