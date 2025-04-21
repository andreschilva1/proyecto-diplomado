FROM node:22-alpine AS node_builder
WORKDIR /app
COPY package*.json ./
COPY resources resources
COPY vite.config.js ./
COPY tailwind.config.js ./ 
COPY postcss.config.js ./
RUN npm install && npm run build

FROM php:8.1-apache AS php_builder

RUN apt-get update && apt-get install -y \
      git openssh-client \ 
      libpq-dev \
      libpng-dev zlib1g-dev libjpeg62-turbo-dev libfreetype6-dev libwebp-dev \
      libzip-dev \
      libicu-dev \
      libonig-dev pkg-config \
      zip unzip \
    && docker-php-ext-configure gd \
         --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
         pdo pdo_pgsql mbstring bcmath intl gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
COPY apache.conf /etc/apache2/sites-available/000-default.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader \
    && php artisan route:cache \
    && chown -R www-data:www-data storage bootstrap/cache


FROM php:8.1-apache

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=node_builder /app/public/build /var/www/html/public/build
COPY --from=php_builder /var/www/html /var/www/html
COPY --from=php_builder /etc/apache2/sites-available/000-default.conf \
     /etc/apache2/sites-available/

RUN a2enmod rewrite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
