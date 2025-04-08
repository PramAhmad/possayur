# Dockerfile
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    nginx \
    gnupg

# Install Node.js 20.x
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install npm dependencies and build assets
RUN npm install  && \
    npm run build && \
    npm cache clean --force

# Optional: Jika perlu build untuk production
# RUN npm ci --only=production && npm run build

# Install Certbot SSL
RUN apt-get install -y certbot python3-certbot-nginx
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache public
RUN chmod -R 775 /var/www/html/public/storage

# Make sure PHP-FPM listens on port 9000 (the default)
EXPOSE 9000