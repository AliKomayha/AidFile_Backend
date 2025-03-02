# Use official PHP image with Apache
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install required dependencies
RUN apt update && apt install -y \
    unzip curl git \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip bcmath \
    && docker-php-ext-enable pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Laravel project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set up Laravel permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose the application port
EXPOSE 80

# Start Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
