FROM ubuntu:latest

RUN apt-get update
RUN apt-get install software-properties-common -y
RUN apt-add-repository ppa:ondrej/php 
RUN apt-get update
RUN apt-get install -y nginx php7.4-fpm php7.4-pgsql curl git && apt-get clean

# NGINX
RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log
VOLUME ["/var/cache/nginx"]
RUN rm /etc/nginx/sites-available/default
ADD ./default /etc/nginx/sites-available/default

# COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && rm composer-setup.php && mv composer.phar /usr/local/bin/composer && chmod a+x /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# BUILD
WORKDIR /var/www/html
#RUN git clone https://github.com/henriSandovalSilva/url_shortner.git
#RUN composer install

EXPOSE 80
CMD service php7.4-fpm start && nginx -g "daemon off;"