#syntax=docker/dockerfile:1
FROM ubuntu:24.04

RUN \
  apt-get update && \
  apt-get -y upgrade && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y php-common \
  php8.3-common \
  php8.3-cli \
  php8.3-curl \
  php-json \
  php8.3-ldap \
  php8.3-mysql \
  php8.3-opcache \
  php8.3-readline \
  php8.3-xml \
  php8.3-mbstring \
  php8.3-xsl \
  php8.3-zip \
  php-apcu \
  php-memcache \
  php8.3-fpm \
  composer \
  fop \
  imagemagick \
  ghostscript \
  poppler-utils \
  ffmpeg \
  npm \
  make \
  rsync \
  git \
  curl \
  wget


# Setup php
RUN \
  ln -s /usr/sbin/php-fpm8.3 /usr/bin/php-fpm && \
  mkdir -p /usr/local/etc/php && \
  mkdir -p /usr/local/etc/php-fpm.d && \
  rm /etc/php/8.3/fpm/pool.d/www.conf

# Add plugins
RUN \
  git clone --depth 1 --branch stable/2.10.x https://github.com/artefactual/atom.git /build/

COPY ./entrypoint.sh /build/entrypoint.sh

WORKDIR /build

ENTRYPOINT ["/build/entrypoint.sh"]

