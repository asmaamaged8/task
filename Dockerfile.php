FROM php:7.4-apache

COPY . /var/www/html/

# Install system dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    git \
    unzip && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change working directory
WORKDIR /var/www/html

# Copy composer.json and composer.lock
COPY composer.json composer.lock ./

# Install project dependencies
RUN composer install --no-dev --no-interaction --no-scripts --no-suggest

# Remove Composer and its cache
RUN rm -rf /usr/local/bin/composer /root/.composer

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
