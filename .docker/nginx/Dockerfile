FROM nginx:1.15.0-alpine

# update na iimagem e add de bash para uso
RUN apk update && apk add bash

# remove confs default do nginx
RUN rm /etc/nginx/conf.d/default.conf

#copia nossas configs pra ele
COPY ./nginx.conf /etc/nginx/conf.d
