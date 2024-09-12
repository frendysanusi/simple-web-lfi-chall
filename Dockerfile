FROM php:7.4-apache
WORKDIR /var/www/html
COPY ./src /var/www/html
COPY ./flag.txt /
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    chmod -R 755 /var/www/html
EXPOSE 80
CMD ["apache2-foreground"]