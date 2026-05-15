# Используем официальный PHP-FPM образ с Alpine (лёгкий)
FROM php:8.2-fpm-alpine AS builder

# Устанавливаем необходимые системные пакеты и расширения PHP
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libpq-dev \
    oniguruma-dev \
    git \
    && docker-php-ext-install \
    pdo_pgsql \
    mbstring \
    fileinfo \
    && docker-php-ext-enable opcache

# Копируем конфиги nginx (создадим позже)
COPY docker/nginx/default.conf /etc/nginx/http.d/default.conf

# Копируем весь код приложения
WORKDIR /var/www/html
COPY . .

# Устанавливаем Composer и зависимости
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
# Разрешаем Git работать с этой папкой
RUN git config --global --add safe.directory /var/www/html
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Настраиваем права на storage и bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Выполняем storage:link (симлинк будет внутри образа)
RUN php artisan storage:link

# Копируем скрипт запуска (чтобы стартовать и PHP-FPM, и Nginx)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Экспонируем порт (Render будет передавать PORT)
EXPOSE 8080

# Запускаем супервизор, который управляет nginx и php-fpm
CMD ["/entrypoint.sh"]