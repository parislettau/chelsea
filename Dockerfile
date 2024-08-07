# Use an official PHP image with Apache and PHP 8.2
FROM php:8.2-apache

# Set timezone environment variable
ENV TZ=Australia/Melbourne
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install additional PHP extensions and ImageMagick
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    git \
    imagemagick \
    libmagickwand-dev \
    cron \  
    wget && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd mbstring dom intl zip && \
    pecl install imagick && \
    docker-php-ext-enable imagick && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Ensure that the 'convert' command is in the PATH
RUN ln -s /usr/bin/convert /usr/local/bin/convert

# Copy virtual host configuration
COPY default.conf /etc/apache2/sites-available/000-default.conf

# Set the ServerName directive to suppress error messages
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Remove default content (existing index.html)
RUN rm -rf /var/www/html/*

# Copy the Kirby site
WORKDIR /var/www/html
COPY . /var/www/html

# Copy the custom policy.xml for ImageMagick
COPY policy.xml /etc/ImageMagick-6/policy.xml

# Set the environmental variables securely
ARG URL
ARG DEBUG

# Create a .env file securely at runtime
RUN echo "URL=$URL" >> .env && \
    echo "DEBUG=$DEBUG" >> .env

# Fix files and directories ownership
RUN chown -R www-data:www-data /var/www/html/

# Activate Apache modules headers & rewrite
RUN a2enmod headers rewrite

# Redirect Apache logs to stdout and stderr
RUN ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log

# Expose ports
EXPOSE 80

# Run the command on container startup
CMD cron && apache2-foreground
