# Utiliza una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala las extensiones necesarias para Laravel
RUN apt-get update && apt-get upgrade -y \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get install -y default-mysql-client

# Descarga la imagen de MySQL y establece la configuración
ENV MYSQL_ROOT_PASSWORD=${DB_PASSWORD}
ENV MYSQL_DATABASE=${DB_DATABASE}
ENV MYSQL_USER=${DB_USERNAME}
ENV MYSQL_PASSWORD=${DB_PASSWORD}

# Configura la base de datos de Laravel
COPY docker/my.cnf /etc/mysql/my.cnf

# Habilita el módulo de Apache necesario para Laravel
RUN a2enmod rewrite

# Establece el directorio de trabajo en el directorio del proyecto Laravel
WORKDIR /var/www/html

# Copia los archivos del proyecto Laravel al contenedor
COPY . /var/www/html

# Instala las dependencias de composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-interaction \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* /var/cache/* \
    && chown -R www-data:www-data /var/www/html/storage

# Copia el archivo de configuración de Apache para Laravel
COPY docker/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Configura el entorno de Laravel
COPY .env.example .env
RUN php artisan key:generate

# Configura la base de datos
RUN php artisan migrate || true

# Establece los permisos en el directorio
RUN chmod -R 755 /var/www/html

# Expon el puerto 80 para el servidor web
EXPOSE 80

# Comando para iniciar el servidor Apache al arrancar el contenedor
CMD ["apache2-foreground"]
