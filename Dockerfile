FROM ubuntu:20.04

RUN \
  apt-get update && \
  apt-get -y upgrade && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y php-common \
  php-cli \
  php-curl \
  php-json \
  php-ldap \
  php-mysql\
  php-opcache \
  php-readline \
  php-xml \
  php-fpm \
  php-mbstring \
  php-xsl \
  php-zip \
  php-apcu \
  composer \
  fop \
  imagemagick \
  ghostscript \
  poppler-utils \ 
  ffmpeg

ADD --checksum=sha256:98ab91eec0e966c8f7b374ae60e3e18f80e383d608459db9e89dca896f675f4d https://storage.accesstomemory.org/releases/atom-2.8.2.tar.gz /atom/
RUN tar -xvf /atom/atom-2.8.2.tar.gz -C /atom/ && mv /atom/atom-2.8.2 /atom/src

COPY ./bootstrap.php /atom/src/
COPY ./entrypoint.sh /atom/src/

WORKDIR /atom/src

ENTRYPOINT ["docker/entrypoint.sh"]

CMD ["fpm"]
