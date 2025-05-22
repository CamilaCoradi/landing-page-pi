FROM php:8.2-fpm

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define diretório da aplicação
WORKDIR /var/www

# Copia os arquivos
COPY . .

# Instala as dependências
RUN composer install

# Comandos Laravel
RUN php artisan optimize:clear \
    && php artisan storage:link \
    && php artisan migrate --force

CMD ["php-fpm"]
