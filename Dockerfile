# Usar imagem base com PHP 8.2
FROM php:8.2-cli

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /app

# Copiar projeto para dentro do container
COPY . .

# Instalar dependências Laravel
RUN composer install --no-dev --optimize-autoloader

# Gerar chave da aplicação (vai usar variáveis do Render)
RUN php artisan key:generate

# Build front-end (se tiver assets)
RUN npm install && npm run build

# Expor porta
EXPOSE 8080

# Comando de inicialização
CMD php artisan serve --host=0.0.0.0 --port=8080
