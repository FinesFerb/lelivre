#!/bin/sh

# Ждём, если нужно, пока БД станет доступной (опционально)
# php artisan migrate --force  # Раскомментируй, если хочешь автоматически мигрировать

# Запускаем php-fpm в фоне
php-fpm -D

# Запускаем nginx в foreground
nginx -g "daemon off;"