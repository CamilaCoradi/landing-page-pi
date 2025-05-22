#!/bin/sh

DB_HOST=${DB_HOST:-mysql.railway.internal}
DB_PORT=${DB_PORT:-3306}

echo "Esperando o banco de dados em $DB_HOST:$DB_PORT..."

while ! nc -z $DB_HOST $DB_PORT; do
  sleep 3
done

echo "Banco disponível! Rodando migrations..."

php artisan migrate --force

echo "Iniciando aplicação..."

exec php artisan serve --host=0.0.0.0 --port=8080
