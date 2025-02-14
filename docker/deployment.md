# Laravel + Node.js Docker Deployment

Proyek ini menggunakan Laravel 10 dengan Node.js untuk asset compilation, di-deploy menggunakan Docker dan Nginx.

## Prasyarat

- Docker 20.10+
- Docker Compose 2.0+
- Git
- Server Ubuntu 22.04 LTS (minimal 2GB RAM)

## Struktur Proyek
```bash
project/
├── docker/
│ ├── nginx/
│ │ └── app.conf
│ └── mysql/
│ └── my.cnf
├── docker-compose.yml
├── Dockerfile
├── .env
└── (file Laravel lainnya)
```

## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/yourproject.git
cd yourproject
```


### 2. Setup Environment

Buat file .env dari template:
```bash
cp .env.example .env
```

Isi konfigurasi database di .env:
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel_user
DB_PASSWORD=strong_password
DB_ROOT_PASSWORD=root_strong_password
```

### 3. Build dan Jalankan Container
```bash
docker-compose up -d --build
```

### 4. Instalasi Dependencies
```bash
docker-compose exec app composer install
docker-compose exec app npm install
docker-compose exec app npm run build
```


### 5. Konfigurasi Laravel
```bash
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan storage:link
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### 6. Migrasi Database
```bash
docker-compose exec app php artisan migrate --seed --force
```



### KONFIGURASI DOCKER !!!

### Dockerfile

```bash 
# php bebas boleh pake alpine
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev \
    libxml2-dev zip unzip libzip-dev nginx gnupg

# node sesuaikan versinya cuy
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# PHP Ext
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# Node depc
RUN npm install && npm run build && npm cache clean --force

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache public
```


### docker-compose.yml

```bash
version: '3.8'

services:
  app:
    build: .
    container_name: laravel_app
    restart: unless-stopped
    volumes:
      - ./:/var/www/html
      - /var/www/html/node_modules
    environment:
      - DB_HOST=mysql
      - DB_DATABASE=${DB_DATABASE}
      - DB_USERNAME=${DB_USERNAME}
      - DB_PASSWORD=${DB_PASSWORD}
    depends_on:
      mysql:
        condition: service_healthy

  webserver:
    image: nginx:alpine
    container_name: laravel_webserver
    restart: unless-stopped
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www/html
      - ./docker/nginx:/etc/nginx/conf.d
    depends_on:
      - app

  mysql:
    image: mysql:8.0
    container_name: laravel_mysql
    restart: unless-stopped
    environment:
      MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD}
      MYSQL_DATABASE: ${DB_DATABASE}
      MYSQL_USER: ${DB_USERNAME}
      MYSQL_PASSWORD: ${DB_PASSWORD}
    volumes:
      - dbdata:/var/lib/mysql
      - ./docker/mysql/my.cnf:/etc/mysql/conf.d/my.cnf
    healthcheck:
      test: ["CMD", "mysqladmin", "ping", "-h", "localhost"]
      interval: 5s
      timeout: 10s
      retries: 10

volumes:
  dbdata:
```



### Perintah Umum
- Start containers
```bash
docker-compose up -d
```
- Stop containers
```bash
docker-compose down
```
- Rebuild containers
```bash
docker-compose up -d --build --force-recreate
```
- View logs
```bash
docker-compose logs -f
```
- Run artisan commands
```bash
docker-compose exec app php artisan [command]
```
- Run npm commands
```bash
docker-compose exec app npm [command]
```
- Run Shell CLI Container
```bash
docker-compose exec app sh
```


### Backup DB
```bash
docker-compose exec mysql sh -c 'exec mysqldump --all-databases -uroot -p"$MYSQL_ROOT_PASSWORD"' > backup.sql
```

### Noted Penting jangan kelewat !!!
- Jangan gunakan root sebagai database user aplikasi (di compose yml)
- Untuk development, gunakan npm run dev dengan hot-reloading
- Selalu update .env sesuai environment
- Backup volume database secara berkala (kalo gada feature backup di softwarenya)

