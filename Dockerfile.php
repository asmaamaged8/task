# Use the official PHP image as the base image
FROM php:7.4-apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Copy application files to the Apache document root
COPY . /var/www/html/

# Expose port 80 for the Apache server
EXPOSE 80
