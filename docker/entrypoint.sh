#!/bin/sh
set -e
cd /var/www/html

# Persistent data lives on the mounted volume (/data on Railway).
DATA_DIR="${DATA_DIR:-/data}"
mkdir -p "$DATA_DIR/public" "$DATA_DIR/private"
[ -f "$DATA_DIR/database.sqlite" ] || touch "$DATA_DIR/database.sqlite"
export DB_CONNECTION="${DB_CONNECTION:-sqlite}"
export DB_DATABASE="${DB_DATABASE:-$DATA_DIR/database.sqlite}"

rm -rf storage/app/public storage/app/private
mkdir -p storage/app
ln -sfn "$DATA_DIR/public" storage/app/public
ln -sfn "$DATA_DIR/private" storage/app/private
ln -sfn "$DATA_DIR/public" public/storage

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data "$DATA_DIR" storage bootstrap/cache

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Exactly one MPM (prefork, required by mod_php) must be enabled.
rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf
ln -sf /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load
ln -sf /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf

# Apache must listen on the platform-provided port.
PORT="${PORT:-8080}"
sed -ri "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

exec apache2-foreground
