FROM php:7.4.3-fpm
RUN apk --update add --no-cache acl dcron yarn

# php
RUN echo "date.timezone = Europe/Bratislava" > /usr/local/etc/php/conf.d/timezone.ini && \
    echo "memory_limit = -1" > /usr/local/etc/php/conf.d/memory.ini && \
    echo "upload_max_filesize = 50M" > /usr/local/etc/php/conf.d/upload.ini && \
    echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/upload.ini && \
    echo "session.gc_maxlifetime = 2592000" >> /usr/local/etc/php/conf.d/upload.ini

ARG WORK_DIR
WORKDIR $WORKDIR

COPY composer.json $WORK_DIR
COPY composer.lock $WORK_DIR
COPY bin $WORK_DIR/bin
COPY src $WORK_DIR/src


