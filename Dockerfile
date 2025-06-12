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
  fop \
  rsync \
  git \
  mysql-client

ADD --checksum=sha256:13c8c26f4398cb5c1ec45e094bc13f59d43e64c45520fc5361d19b8efbba24ed https://storage.accesstomemory.org/releases/atom-2.9.1.tar.gz /atom/
RUN mkdir -p /atom/src && tar -xvf /atom/atom-2.9.1.tar.gz -C /atom/src/ --strip 1
#RUN mv /atom/atom-2.9.1 /atom/src

COPY ./bootstrap.php /atom/src/
COPY ./entrypoint.sh /atom/src/
COPY ./dbdump.sh /atom/src/
COPY ./atom-fixes/2.9.1/ /atom/src/

# Overwrite specific Atom files
#RUN /atom-fixes/appy.sh 2.9.1

# Setup php
RUN \
  ln -s /usr/sbin/php-fpm8.3 /usr/bin/php-fpm && \
  mkdir -p /usr/local/etc/php && \
  mkdir -p /usr/local/etc/php-fpm.d && \
  rm /etc/php/8.3/fpm/pool.d/www.conf

# Add plugins
RUN \
  git clone --depth 1 --branch v2.9.1 https://github.com/artefactual/atom.git /build/

COPY ./plugindev/ /plugindev

RUN \
  ln -s /atom/src/dist /build/dist

# Run 
RUN set -xe \
    && rsync -a /plugindev/plugins/ /build/plugins \
    && cd /build \
    && npm install \
    && npm run build \
    && cd /atom/src/ \
    && rm -rf /build

RUN \
  rsync -a /build/plugins/ /atom/src/plugins/ 

WORKDIR /atom/src

ENTRYPOINT ["/atom/src/entrypoint.sh"]

CMD ["fpm"]
