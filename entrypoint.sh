#!/bin/bash

echo ">>> Entrypoint iniciado em $(date)"

a2enmod rewrite

# ⚠️ Configurações abaixo são APENAS para Docker
# Para servidor compartilhado (Hostinger, Kinghost), use .htaccess ou php.ini
# Aumentar limites de upload e timeout do PHP

echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/custom.ini
echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/custom.ini
echo "max_execution_time=300" >> /usr/local/etc/php/conf.d/custom.ini
echo "default_socket_timeout=300" >> /usr/local/etc/php/conf.d/custom.ini
echo "max_input_time=300" >> /usr/local/etc/php/conf.d/custom.ini
echo "memory_limit=512M" >> /usr/local/etc/php/conf.d/custom.ini

if ! [ -x "$(command -v composer)" ]; then
    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer
fi

if [ ! -f /var/www/html/artisan ]; then
    composer create-project laravel/laravel /var/www/html
fi

chown -R www-data:www-data /var/www/html
chmod -R 775 /var/www/html

echo ">>> Apache iniciado em $(date)"
exec apache2-foreground