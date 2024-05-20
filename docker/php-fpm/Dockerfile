FROM php:8.2-fpm

ENV NODEJS_VERSION 18.19.1

# Set the working directory
WORKDIR /var/www/html

# Install needed packages
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    libxml2-dev \
    libssl-dev \
    libonig-dev \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install and enable PHP extensions
RUN yes '' | docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-enable pdo pdo_mysql mysqli

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and Yarn
RUN npm install -g n yarn \
    && n $NODEJS_VERSION

# Ensure that the web server runs as a non-root user
RUN chown -R www-data:www-data /var/www/html

# Copy the rest application files
COPY . .

# Install PHP dependencies using Composer
RUN composer install

# Build frontend assets using Yarn
RUN yarn

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
