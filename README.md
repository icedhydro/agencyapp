# Aplikace pro správu služeb (Laravel 12 + Inertia.js + Vue 3)

Moderní webová aplikace pro správu služeb a přijatých zpráv.  
Postaveno na nejnovějším **Laravel 12**, **Inertia.js**, **Vue 3** a **Tailwind CSS**.

---

## ✨ Funkce

-   Veřejná část webu zobrazující seznam služeb
-   Kontaktní formulář s validací a flash notifikacemi
-   Administrace (pouze pro přihlášené) s možností:
    -   Správy přijatých zpráv (vyhledávání, stránkování, mazání)
    -   Správy služeb (vytváření, úprava, mazání)
-   Přehledné UI postavené na Tailwind CSS
-   Flash notifikace pomocí Vue3 Toastify

---

## ⚙️ Požadavky

-   PHP 8.3+
-   Composer 2+
-   Node.js v20.18.0 + npm
-   MySQL 8
-   Docker a Docker Compose (volitelně)

---

## 🚀 Lokální instalace

```bash
# 1. Naklonování repozitáře
git clone https://github.com/icedhydro/agencyapp.git
cd agencyapp

# 2. Instalace PHP závislostí
composer install

# 3. Instalace Node.js závislostí
npm install

# 4. Kopírování souboru prostředí a generování klíče
cp .env.example .env
php artisan key:generate

# 5. Migrace databáze
php artisan migrate

# 6. Sestavení frontendu
npm run build

# 7. Spuštění lokálního serveru
php artisan serve
```

---

## 🐳 Instalace a spuštění pomocí Docker Compose

### 1. Naklonování repozitáře

```bash
git clone https://github.com/icedhydro/agencyapp.git
cd agencyapp
```

### 2. Vytvoření prostředí a konfigurace

```bash
cp .env.example .env
```

Uprav `.env` soubor (zejména nastavení DB přístupu):

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=password
```

### 3. Spuštění aplikace pomocí Docker Compose

```bash
docker-compose up -d --build
```

Tímto se spustí:

-   PHP 8.3 s Laravelem
-   MySQL databáze
-   Node.js/Vite development server

### 4. Nastavení aplikace uvnitř kontejneru

Přihlaste se do PHP kontejneru:

```bash
docker-compose exec app bash

# Instalace závislostí (pokud ještě nebyly)
composer install
npm install

# Generování klíče
php artisan key:generate

# Migrace databáze
php artisan migrate

# Build frontendu
npm run build
```

---

## 🌍 URL aplikace

Po ústěšném spuštění:

-   Web aplikace: [http://localhost](http://localhost)
-   PHPMyAdmin (pokud použijete image): [http://localhost:8080](http://localhost:8080)

---

## 🚀 Technologie

-   Laravel 12
-   Vue.js 3 + Inertia.js
-   Tailwind CSS
-   Vite
-   MySQL
-   Docker Compose

---

## 💡 Tipy pro nasazení (production)

-   Používejte "npm run build" (production assets)
-   Nastavte APP_ENV na "production"
-   Zapněte cache konfigurace:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

Michal Bednařík 2025
