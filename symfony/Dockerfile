FROM touch4it/docker-php7:php7.3-fpm-nginx-dev
#img z ktorého výchádza použítý image
RUN apk --update add --no-cache acl dcron yarn

# php
RUN echo "date.timezone = Europe/Bratislava" > /usr/local/etc/php/conf.d/timezone.ini && \
    echo "memory_limit = -1" > /usr/local/etc/php/conf.d/memory.ini && \
    echo "upload_max_filesize = 50M" > /usr/local/etc/php/conf.d/upload.ini && \
    echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/upload.ini && \
    echo "session.gc_maxlifetime = 2592000" >> /usr/local/etc/php/conf.d/upload.ini

# cron
#RUN mkdir -p /etc/crontabs && \
#    echo "* * * * * /usr/local/bin/php /var/www/html/bin/console swiftmailer:spool:send >> /proc/1/fd/1 2>&1" >> /etc/crontabs/root && \
#    echo "" >> /etc/crontabs/root && \
#    echo "" >> /etc/crontabs/root

COPY . /var/www/html
#kopirovanie do kontainera
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
# COPY ./entrypoint.sh /entrypoint.sh

WORKDIR /var/www/html

# permissions
RUN mkdir -p /tmp/finappie && \
    chown -R www-data:www-data /tmp/finappie && \
    setfacl -R -m u:www-data:rwX /tmp/finappie && \
    setfacl -dR -m u:www-data:rwX /tmp/finappie

# RUN chmod +x /entrypoint.sh
# CMD ["/entrypoint.sh"]
