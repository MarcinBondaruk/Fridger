FROM php:8.0.14-fpm-alpine3.15 as base
RUN mv /var/www/html /var/www/app
WORKDIR /var/www/app

ADD https://github.com/just-containers/s6-overlay/releases/download/v2.2.0.1/s6-overlay-amd64-installer /tmp/
RUN chmod +x /tmp/s6-overlay-amd64-installer && /tmp/s6-overlay-amd64-installer /
RUN apk update && \
    apk add nginx

COPY docker/s6-overlay/etc /etc
# clean up any deafault configuration
RUN rm /etc/nginx/http.d/*


FROM base as local
COPY docker/local/nginx/shopper.conf /etc/nginx/http.d
COPY app/ /var/www/app

ENTRYPOINT ["/init"]

