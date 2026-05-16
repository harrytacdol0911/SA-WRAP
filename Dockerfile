FROM php:8.4-cli

WORKDIR /app

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --optimize-autoloader --no-scripts --no-interaction

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
