FROM nginx:stable-alpine

ADD ./nginx/nginx.conf /etc/nginx/
ADD ./nginx/default.conf /etc/nginx/conf.d/

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

