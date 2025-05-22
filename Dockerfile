FROM php:8.2-fpm

# Instala dependências do sistema necessárias
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Instala dependências do PHP (sem dev para ambiente de produção)
RUN composer install --no-dev --optimize-autoloader

RUN php artisan optimize:clear && php artisan storage:link || true

# Expõe a porta 8080 (padrão do servidor embutido do Laravel)
EXPOSE 8080

# Comando para rodar o servidor embutido Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
CMD ["/entrypoint.sh"]
