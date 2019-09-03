FROM php:7.3.6-fpm

WORKDIR /var/www/html

RUN apt-get update -qq \
    && apt-get install -y --no-install-recommends build-essential  \
    apt-transport-https ca-certificates gnupg2 apt-utils nodejs \
    git vim wget zip unzip libzip-dev libpq-dev \
    && docker-php-ext-install zip pdo pdo_pgsql

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
 && apt-get install -y nodejs \
 && npm install npm@latest -g

# Install composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN echo 'export PATH="$HOME/.symfony/bin:$PATH"' >> /root/.bashrc

RUN cp  /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini