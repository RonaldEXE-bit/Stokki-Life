# Imagem base com PHP 8.2 + Composer
FROM php:8.2-cli

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar projeto
WORKDIR /app
COPY . .

# Instalar dependências Laravel
RUN composer install --no-dev --optimize-autoloader

# Gerar chave
RUN php artisan key:generate

# Build front-end
RUN apt-get install -y nodejs npm && npm install && npm run build

# Expor porta
EXPOSE 8080

# Comando de start
CMD php artisan serve --host=0.0.0.0 --port=8080
