FROM php:8.4-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
        libicu-dev libzip-dev libpng-dev libjpeg-dev libwebp-dev libfreetype6-dev libonig-dev libsqlite3-dev unzip git \
    && docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype \
    && docker-php-ext-install -j"$(nproc)" pdo_sqlite pdo_mysql intl zip gd bcmath exif opcache mbstring \
    && a2dismod -f mpm_event mpm_worker || true \
    && a2enmod mpm_prefork rewrite headers expires deflate \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf \
    && sed -ri 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html

COPY composer.json composer.lock ./
COPY app/helpers.php app/helpers.php
RUN composer install --no-dev --no-interaction --no-progress --no-scripts --prefer-dist

COPY . .
RUN composer dump-autoload --no-dev --optimize --no-scripts \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod +x docker/entrypoint.sh

EXPOSE 8080
CMD ["docker/entrypoint.sh"]
