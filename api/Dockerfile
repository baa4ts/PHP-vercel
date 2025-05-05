# Usar la imagen base de PHP 8.3.8 con Apache
FROM php:8.3.8-apache

# ================================================
# Notas de Deprecación
# ================================================
# - xmlrpc: deprecated
# - Geoip: deprecated
#
# Si necesitas usar estas extensiones, ten en cuenta que están en desuso y podrían no ser
# compatibles con versiones futuras de PHP.

# ================================================
# Instalar dependencias del sistema y extensiones PHP
# ================================================
# Este comando instala las dependencias del sistema necesarias para construir las extensiones PHP,
# luego instala las extensiones PHP requeridas y finalmente limpia la caché de apt para reducir el tamaño de la imagen.
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    g++ zlib1g-dev make autoconf libc-dev pkg-config libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    libxslt-dev libcurl4-openssl-dev libpq-dev libldap2-dev \
    libsqlite3-dev libbz2-dev libgmp-dev libwebp-dev libicu-dev \
    libc-client-dev libkrb5-dev libsodium-dev libedit-dev \
    libbrotli-dev uuid-dev \

    # Instalación de extensiones PHP
    && docker-php-ext-install \
    bcmath bz2 calendar exif ftp gettext intl mysqli opcache \
    pdo_mysql pdo_sqlite soap sockets xsl zip \

    # ================================================
    # Instalación de extensiones PECL
    # ================================================
    # Las extensiones PECL son instaladas con PECL y habilitadas con docker-php-ext-enable
    && pecl install \
    apcu brotli ds igbinary msgpack uuid \

    # ================================================
    # Opcionales: Extensiones adicionales
    # ================================================
    # Si necesitas habilitar algunas extensiones adicionales, descomenta las siguientes líneas
    # para instalar y habilitar Redis, MongoDB, IMAP, gRPC.
    #
    # Descomentar para habilitar IMAP:
    # && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    # && docker-php-ext-install imap
    #
    # Descomentar para habilitar Redis, MongoDB o gRPC:
    # && pecl install redis mongodb grpc \
    # && docker-php-ext-enable redis mongodb grpc

    # ================================================
    # Limpieza de dependencias y caché
    # ================================================
    # Se eliminan las dependencias y archivos temporales que ya no son necesarios para reducir el tamaño de la imagen.
    && apt-get purge -y --auto-remove g++ make autoconf pkg-config libc-dev \
    && rm -rf /var/lib/apt/lists/* /tmp/pear