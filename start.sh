#!/bin/bash
chown -R www-data:www-data /var/www/html
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;
mkdir -p /var/www/html/storage
chmod -R 775 /var/www/html/storage
exec docker-php-entrypoint apache2-foreground
