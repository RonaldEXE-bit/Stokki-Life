#!/bin/bash
# Aplica migrations automaticamente
php artisan migrate --force

# Sobe servidor Laravel na porta esperada pelo Render/Railway
php artisan serve --host=0.0.0.0 --port=8080

