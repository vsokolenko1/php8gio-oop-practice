# Install image from php8.4.8-fpm
FROM php:8.4.8-fpm

# Run commands for install to image
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip 
    
#Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Setup workdir for project
WORKDIR  /var/www