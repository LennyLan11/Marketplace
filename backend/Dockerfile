# Use the official PHP 7.4 Apache image as a base
FROM php:7.4-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install PHP extensions required for MySQL and other dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the PHP files to the Apache web root directory
COPY . /var/www/html/

# Expose port 80 to the outside world
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]