#!/usr/bin/env bash

# Instalace PHP závislostí
composer install --no-dev --optimize-autoloader

# Instalace Node.js závislostí
npm install
npm run build

# Migrace databáze
php artisan migrate --force
