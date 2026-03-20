FROM php:8.2-cli

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev \
    nodejs npm

# Instalar extensões PHP
RUN docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Diretório da aplicação
WORKDIR /var/www

# Copiar projeto
COPY . .

# Copiar php.ini customizado
COPY ./docker/php.ini /usr/local/etc/php/php.ini

# Instalar dependências
RUN composer install
RUN npm install && npm run build

# Permissões Laravel
RUN chmod -R 777 storage bootstrap/cache

# Porta
EXPOSE 8000



# Subir aplicação
CMD composer install && \
    php artisan key:generate && \
    php artisan migrate && \
    php artisan serve --host=0.0.0.0 --port=8000