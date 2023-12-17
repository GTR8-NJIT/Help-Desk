FROM php:7.4-apache

##RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy your PHP application files to the container
COPY src/ /var/www/html/

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html/
