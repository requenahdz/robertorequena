# Utilizamos una imagen base que contenga PHP y Apache
FROM php:8.1-apache

# Variables de argumento
ARG uid
ARG user

# Actualizamos los paquetes e instalamos extensiones de PHP que pueden ser necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nano \
    zip \
    unzip \
    nodejs \
    npm \
    libmcrypt-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Verificamos que Node.js y npm se hayan instalado correctamente
RUN node --version
RUN npm --version

RUN npm cache clean --force

# Instala las dependencias del proyecto
# RUN npm install
# RUN npm ci --legacy-peer-deps

# Copia el archivo de configuración de Apache para habilitar el sitio Laravel
# COPY apache2.conf /etc/apache2/sites-available/000-default.conf

# Habilita la reescritura de URLs
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Reinicia Apache
RUN service apache2 restart
# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de Laravel al contenedor
COPY . .

# Crea una carpeta para composer
RUN mkdir -p /usr/local/bin/composer

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crea un usuario de sistema para ejecutar comandos de Composer y Artisan
RUN useradd -G www-data,root -u 1000 -d /home/app app
RUN mkdir -p /home/app/.composer && \
    chown -R app:app /home/app

# Otros comandos que puedas necesitar
RUN chmod +x git.sh
RUN chmod +x docker.sh

# Instala las dependencias de Composer
# RUN composer install

# Instala las dependencias de npm (modifica este comando según tu caso)
# Ejemplo: RUN npm install

# Crea una carpeta para el almacenamiento de Laravel
# RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
