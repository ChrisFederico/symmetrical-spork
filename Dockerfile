# Usa l'immagine di base di PHP con Apache e PHP 8
FROM php:8.0-apache

# Copy the custom default.conf file
COPY docker/default.conf /etc/apache2/sites-available/000-default.conf

# Installa le dipendenze necessarie
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip

# Copia il codice del progetto nella directory del container
COPY . /var/www/html

# Imposta il documento root di Apache
WORKDIR /var/www/html/public
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Installa Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH="/var/www/html/vendor/bin:${PATH}"

# Copia il file composer.json e composer.lock separatamente e installa le dipendenze
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --no-dev --prefer-dist \
    && rm -rf /root/.composer

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia tutto il resto del codice e genera l'autoloader
COPY . .
RUN composer dump-autoload --no-scripts --no-dev --optimize

# Imposta le variabili d'ambiente per Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APACHE_LOG_DIR /var/www/html/storage/logs

# Abilita il modulo di rewrite di Apache
RUN a2enmod rewrite

# Espone la porta 80 per il traffico HTTP
EXPOSE 80

# Avvia il server Apache
CMD ["apache2-foreground"]
