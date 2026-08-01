FROM dunglas/frankenphp:php8.4-bookworm

WORKDIR /app

RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    bcmath \
    xml \
    curl \
    zip \
    intl \
    gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node.js 22
RUN apt-get update \
    && apt-get install -y curl ca-certificates gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && node -v \
    && npm -v

RUN npm ci
RUN npm run build

RUN php artisan storage:link || true

RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 8080

CMD php artisan migrate --force && frankenphp php-server -r public -p 8080
