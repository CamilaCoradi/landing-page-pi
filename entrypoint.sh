#!/bin/sh

echo "Esperando o banco de dados..."

# Loop para esperar a porta 3306 do banco responder
while ! nc -z mysql.railway.internal 3306; do
  sleep 3
done

echo "Banco disponível! Rodando migrations..."

php artisan migrate --force

echo "Iniciando aplicação..."

php artisan serve --host=0.0.0.0 --port=8080
