# Menggunakan image PHP resmi dengan Apache
FROM php:7.4-apache

# Instal ekstensi PHP yang diperlukan (misalnya mysqli)
RUN docker-php-ext-install mysqli

# Copy aplikasi ke dalam container
COPY . /var/www/html/

# Set hak akses folder agar Apache dapat menulis
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80
