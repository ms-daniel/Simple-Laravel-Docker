# imagem php + nodejs e postgresql
FROM php:8.2-fpm-alpine
RUN apk add --no-cache openssl bash nodejs npm postgresql-dev
RUN docker-php-ext-install bcmath pdo pdo_pgsql

# diretorio de trabalho
WORKDIR /var/www

# nginx
RUN rm -rf /var/www/html
RUN ln -s public html

# composer install
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# aplicacao para container
COPY . /var/www

# comnando para too e qualquer usuariio acessar a storage, e um exagero, mas como e algo isolado ta ok
RUN chmod -R 777 /var/www/storage

# porta para acesso
EXPOSE 9000

# php sempre ativo
ENTRYPOINT ["php-fpm"]

