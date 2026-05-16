FROM php:8.4-apache

# Install all required system tools including git, zip, unzip
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

# Allow Composer to run as root (safe inside container)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-interaction --no-progress

# Build frontend if package.json exists
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

EXPOSE 80
RUN php artisan migrate --force
CMD php artisan serve --host=0.0.0.0 --port=$PORT
