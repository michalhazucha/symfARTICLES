FROM touch4it/docker-php7:php7.3-fpm-nginx-dev

RUN apk --update add --no-cache acl dcron yarn

# php
RUN echo "date.timezone = Europe/Bratislava" > /usr/local/etc/php/conf.d/timezone.ini && \
    echo "memory_limit = -1" > /usr/local/etc/php/conf.d/memory.ini && \
    echo "upload_max_filesize = 50M" > /usr/local/etc/php/conf.d/upload.ini && \
    echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/upload.ini && \
    echo "session.gc_maxlifetime = 2592000" >> /usr/local/etc/php/conf.d/upload.ini


COPY . /var/www/html
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
COPY ./entrypoint.sh /entrypoint.sh

WORKDIR /var/www/html


CMD ["/entrypoint.sh"]
