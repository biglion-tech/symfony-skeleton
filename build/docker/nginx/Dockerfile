FROM nginx:1.12-alpine as runtime-nginx

COPY ./build/docker/nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /app
COPY ./ /app
