#!/bin/bash
set -e

mkdir -p /var/www/html/wp-content

# Merge custom wp-content
if [ -d /tmp/wp-content ]; then
    cp -r /tmp/wp-content/* /var/www/html/wp-content/ || true
fi

# Fix ownership and permissions
chown -R www-data:www-data /var/www/html/wp-content
find /var/www/html/wp-content -type d -exec chmod 755 {} \;
find /var/www/html/wp-content -type f -exec chmod 644 {} \;

# start WordPress
exec docker-entrypoint.sh "$@"
