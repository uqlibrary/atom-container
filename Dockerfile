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
  fop \
  imagemagick \
  ghostscript \
  poppler-utils \
  ffmpeg \
  rsync \
  curl \
  wget \
  mysql-client

ADD --checksum=sha256:e135e69b2a743e00061dfee7bcc206af4fc6248cc180b2c894ae5291f4aee039 https://storage.accesstomemory.org/releases/atom-2.10.1.tar.gz /atom/
RUN mkdir -p /atom/src && tar -xvf /atom/atom-2.10.1.tar.gz -C /atom/src/ --strip 1
RUN mkdir -p /atom/src/downloads && mkdir -p /atom/src/uploads && mkdir -p /atom/src/cache && mkdir -p /atom/src/log

COPY ./bootstrap.php /atom/src/
COPY ./entrypoint.sh /atom/src/
ADD ./atom-fixes/2.10.1/ /atom/src/
COPY ./scripts /atom/scripts

# Setup php
RUN \
  ln -s /usr/sbin/php-fpm8.3 /usr/bin/php-fpm && \
  mkdir -p /usr/local/etc/php && \
  mkdir -p /usr/local/etc/php-fpm.d && \
  rm /etc/php/8.3/fpm/pool.d/www.conf

RUN /atom/src/patch/apply.sh

COPY ./images/favicon.ico /atom/src/favicon.ico
COPY ./images/logo.png /atom/src/images/
COPY ./images/logo.png /atom/src/plugins/arDominionB5Plugin/images/
COPY ./images/logo.png /atom/src/plugins/uqDominionProdB5Plugin/images/

COPY ./reports/ /atom/src/uq/reports

WORKDIR /atom/src

ENTRYPOINT ["/atom/src/entrypoint.sh"]

CMD ["fpm"]
