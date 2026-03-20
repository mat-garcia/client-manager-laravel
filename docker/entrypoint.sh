
echo "Iniciando aplicação..."


if [ ! -f .env ]; then
  echo "Criando .env"
  cp .env.example .env
fi

if [ ! -d "vendor" ]; then
  echo "Instalando dependências PHP"
  composer install
fi

if [ ! -d "node_modules" ]; then
  echo "Instalando dependências Node"
  npm install
fi


if [ ! -d "public/build" ]; then
  echo "Buildando frontend..."
  npm run build
fi

# Gerar key
php artisan key:generate --force

# Migrate
php artisan migrate --force

# Seed
php artisan db:seed --force

# Cache clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "Build completo. Iniciando servidor..."

echo "Servidor rodando em http://localhost:8000"

# Sobe servidor
php artisan serve --host=0.0.0.0 --port=8000


