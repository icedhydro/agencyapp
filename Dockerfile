#  Laravel + PHP image s Composerem
FROM laravelsail/php83-composer:latest

# Nastavení pracovní složky
WORKDIR /var/www/html

# Zkopírování celého projektu
COPY . .

# Instalace PHP závislostí
RUN composer install --no-dev --optimize-autoloader

# Instalace Node.js a build frontendu
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install \
    && npm run build

# Otevření portu, na kterém Laravel běží
EXPOSE 10000

# Start příkaz
CMD php artisan serve --host=0.0.0.0 --port=10000
