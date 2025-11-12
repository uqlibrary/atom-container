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
  fop \
  rsync \
  git \
  curl \
  wget \
  mysql-client

ADD --checksum=sha256:d86e4f5efb3c5a95d431de978ffacbba866d5341412ff1c1bb939d4a2a440231 https://storage.accesstomemory.org/releases/atom-2.9.2.tar.gz /atom/
RUN mkdir -p /atom/src && tar -xvf /atom/atom-2.9.2.tar.gz -C /atom/src/ --strip 1
#RUN mv /atom/atom-2.9.2 /atom/src

COPY ./bootstrap.php /atom/src/
COPY ./entrypoint.sh /atom/src/
COPY ./dbdump.sh /atom/src/
COPY ./db-restore.sh /atom/src/
COPY ./set-ad-login.sh /atom/src/
COPY ./atom-fixes/2.9.2/ /atom/src/
COPY ./images/logo.png /atom/src/images/
COPY ./images/logo.png /atom/src/plugins/arDominionB5Plugin/images/

# Setup php
RUN \
  ln -s /usr/sbin/php-fpm8.3 /usr/bin/php-fpm && \
  mkdir -p /usr/local/etc/php && \
  mkdir -p /usr/local/etc/php-fpm.d && \
  rm /etc/php/8.3/fpm/pool.d/www.conf

# Add plugins
RUN \
  git clone --depth 1 --branch stable/2.9.x https://github.com/artefactual/atom.git /build/

COPY ./plugindev/ /plugindev

RUN \
  ln -s /atom/src/dist /build/dist

# Run 
RUN set -xe \
    && rsync -a /plugindev/plugins/ /build/plugins \
    && npm install -g "less@<4.0.0" n \
    && n stable

RUN set - xe \
  && export PATH="/usr/local/bin:$PATH" \
  && cd /build \
  && npm install \
  && npm run build \
  && cd /atom/src/

RUN \
  rsync -a /build/plugins/ /atom/src/plugins/ \
  && rm -rf /build
  


WORKDIR /atom/src

ENTRYPOINT ["/atom/src/entrypoint.sh"]

CMD ["fpm"]
