FROM ubuntu:20.04

RUN \
  apt-get update && \
  apt-get -y upgrade && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y php-common \
  php7.4-cli \ 
  php7.4-curl \
  php7.4-json \
  php7.4-ldap \
  php7.4-mysql \
  php7.4-opcache \
  php7.4-readline \
  php7.4-xml \
  php7.4-mbstring \
  php7.4-xsl \
  php7.4-zip \
  php-apcu \
  php-apcu-bc \
  php-memcache \
  php7.4-fpm \
  php7.4-xsl \
  php7.4-zip \
  composer \
  fop \
  imagemagick \
  ghostscript \
  poppler-utils \ 
  ffmpeg \
  mariadb-client

ADD --checksum=sha256:98ab91eec0e966c8f7b374ae60e3e18f80e383d608459db9e89dca896f675f4d https://storage.accesstomemory.org/releases/atom-2.8.2.tar.gz /atom/
RUN tar -xvf /atom/atom-2.8.2.tar.gz -C /atom/ --strip 1 && mv /atom/atom-2.8.2 /atom/src

COPY ./bootstrap.php /atom/src/
COPY ./entrypoint.sh /atom/src/
COPY ./dbdumps.sh /atom/src/
RUN \
  ln -s /usr/sbin/php-fpm7.4 /usr/bin/php-fpm && \
  mkdir -p /usr/local/etc/php && \
  mkdir -p /usr/local/etc/php-fpm.d && \
  rm /etc/php/7.4/fpm/pool.d/www.conf

WORKDIR /atom/src

ENTRYPOINT ["/atom/src/entrypoint.sh"]

CMD ["fpm"]
