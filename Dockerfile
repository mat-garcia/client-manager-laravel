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

# Configuração do PHP
COPY ./docker/php.ini /usr/local/etc/php/php.ini

# Permissões Laravel
RUN chmod -R 777 storage bootstrap/cache

# Copia entrypoint
COPY ./docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8000

#iniciar aplicação
CMD ["/entrypoint.sh"]