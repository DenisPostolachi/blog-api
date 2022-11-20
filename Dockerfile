FROM nginx:1.20-alpine

ARG UID=1000
ARG GID=1000

RUN apk -U upgrade;

RUN apk add --no-cache \
    bash \
    git \
    grep \
    dcron \
    tzdata \
    su-exec \
    shadow \
    openssl \
    supervisor;

RUN apk add --no-cache \
    php8 \
    php8-fpm \
    php8-opcache \
    php8-dev \
    php8-gd \
    php8-curl \
    php7-memcached \
    php8-pdo \
    php8-pdo_mysql \
    php8-mysqli \
    php8-mysqlnd \
    php8-mbstring \
    php8-xml \
    php8-zip \
    php8-bcmath \
    php8-soap \
    php8-intl \
    php7-msgpack \
    php7-igbinary \
    php8-phar \
    php8-json \
    php8-tokenizer \
    php8-dom \
    php8-fileinfo \
    php8-ctype \
    php8-iconv \
    php8-xmlwriter \
    php8-xmlreader \
    php8-simplexml \
    php8-ldap \
    php8-pecl-imagick \
    php8-openssl \
    php8-sodium \
    php8-session \
    #php8-pecl-xdebug \
    php8-pecl-yaml

RUN usermod -u ${UID} nginx && groupmod -g ${GID} nginx

RUN echo "Europe/Chisinau" > /etc/timezone && \
    cp /usr/share/zoneinfo/Europe/Chisinau /etc/localtime && \
    apk del --no-cache tzdata && \
    rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*;

WORKDIR /var/www/html/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /var/www/html && \
    mkdir -p /var/cache/nginx && \
    mkdir -p /var/lib/nginx && \
    mkdir -p /var/log/nginx && \
    touch /var/log/nginx/access.log && \
    touch /var/log/nginx/error.log && \
    chown -R nginx:nginx /var/cache/nginx /var/lib/nginx /var/log/nginx && \
    chmod -R g+rw /var/cache/nginx /var/lib/nginx /var/log/nginx /etc/php8/php-fpm.d && \
    ln -s /usr/bin/php8 /usr/bin/php;

COPY docker/conf/php-fpm-pool.conf /etc/php8/php-fpm.d/www.conf
COPY docker/conf/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/conf/nginx.conf /etc/nginx/nginx.conf
COPY docker/conf/nginx-site.conf /etc/nginx/conf.d/default.conf
COPY docker/conf/php.ini /etc/php8/conf.d/50-settings.ini
COPY docker/entrypoint.sh /sbin/entrypoint.sh

COPY --chown=nginx:nginx ./ .

EXPOSE 9004

ENTRYPOINT ["/sbin/entrypoint.sh"]

CMD ["true"]
