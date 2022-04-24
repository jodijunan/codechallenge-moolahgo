FROM yannice92/lumen-php-fpm-nginx-base-image:7.3-fpm-alpine-dev

LABEL Maintainer="Malik Al Ichsan <malik.al.ichsan@gmail.com>"

ENV TZ=Asia/Jakarta
ENV APP_ROOT=/var/www/html
ENV HOME=${APP_ROOT}
ENV APP_NAME=BACKEND
ENV APP_ENV=local

WORKDIR ${APP_ROOT}

COPY . ${APP_ROOT}

ADD .docker/scripts/uid_entrypoint.sh /uid_entrypoint.sh
RUN chmod -R ug+x /uid_entrypoint.sh
ENTRYPOINT ["/uid_entrypoint.sh"]

RUN composer install && composer dump-autoload --no-dev && ls -la

RUN find . -type d \( -path ./vendor \) -prune -o -exec chgrp 0 {} \;
RUN find . -type d \( -path ./vendor \) -prune -o -exec chmod g=u {} \;

RUN chmod g=u /etc/passwd

RUN composer clearcache

#nginx permission
RUN chgrp -R 0 /var/lib/nginx /var/lib/nginx/logs && chmod -R g=u /var/lib/nginx /var/lib/nginx/logs

ADD .docker/scripts/custom.sh /custom.sh
RUN chmod 755 /custom.sh && sh /custom.sh

ADD .docker/conf/nginx.conf /etc/nginx/

ADD .docker/php/php-ini-overrides.ini /etc/php7/conf.d/20_custom.ini
ADD .docker/conf/lumen.conf /etc/nginx/conf.d/lumen.conf
COPY .docker/conf/fpm-pool.conf /etc/php7/php-fpm.d/www.conf

COPY .docker/scripts/crontab /cron

ADD .docker/scripts/start.sh /start.sh
RUN chmod 755 /start.sh

COPY .docker/conf/supervisord-worker.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 8080 443 9000

USER 1001

CMD ["sh","/start.sh", "&"]

