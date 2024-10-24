# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instala las dependencias necesarias para compilar la extensión de MongoDB
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev pkg-config libssl-dev

# Instala la extensión de MongoDB mediante PECL
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copia el código de tu proyecto a la carpeta donde Apache servirá archivos
COPY ./src/ /var/www/html/

# Da permisos a la carpeta de trabajo
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto 80 para que el contenedor sea accesible desde fuera
EXPOSE 80

