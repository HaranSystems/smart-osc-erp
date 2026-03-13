# Use the official PHP image as a base image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git libxml2-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql xml

# Set the working directory in the container
WORKDIR /var/www

# Copy the composer from the official composer image to install PHP dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code into the container
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions for the application files
RUN chown -R www-data:www-data /var/www

# Expose port 9000 to communicate with the app
EXPOSE 9000

# Start PHP-FPM to serve the app
CMD ["php-fpm"]
