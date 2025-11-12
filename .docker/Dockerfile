FROM php:8.3-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get upgrade -y && apt-get install -y \
      procps \
      nano \
      git \
      unzip \
      git-core \
      curl \
      build-essential \
      openssl \
      libssl-dev \
      libicu-dev \
      zlib1g-dev \
      libxml2 \
      libxml2-dev \
      libreadline-dev \
      supervisor \
      cron \
      sudo \
      libzip-dev \
      && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
      && docker-php-ext-configure mysqli \
      && docker-php-ext-configure intl \
      && docker-php-ext-install \
      pdo\
      mysqli \
      pdo_mysql \
      sockets \
      intl \
      opcache \
      zip \
      && rm -rf /tmp/* \
      && rm -rf /var/list/apt/* \
      && rm -rf /var/lib/apt/lists/* \
      && apt-get clean

WORKDIR /var/www/html

ARG USERNAME=miguel
ARG USER_UID=1000
ARG USER_GID=1000

RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
    && chmod 0440 /etc/sudoers.d/$USERNAME


#Instalación de Composer
COPY --from=composer:2.8.11 /usr/bin/composer /usr/local/bin/composer

#Instalacion de Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

#Instalación de PHPUnit
RUN composer global require phpunit/phpunit && ln -s /var/www/html/vendor/bin/phpunit /usr/local/bin/phpunit