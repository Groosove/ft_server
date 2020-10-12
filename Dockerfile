# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: flavon <flavon@student.21-school.ru>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/08/15 19:33:09 by flavon            #+#    #+#              #
#    Updated: 2020/10/12 10:10:42 by flavon           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# Operation System
FROM debian:buster

# HTTP and HTTPS port
EXPOSE 80 443

# SRCS
COPY srcs/wp-config.php ./root/
COPY srcs/start.sh ./root/
COPY srcs/nginx.conf ./root/
COPY srcs/config.inc.php ./root/
COPY srcs/start_off_autoindex.sh ./root/

# Install utilites
RUN apt-get -y update
RUN apt-get -y upgrade
RUN apt-get install -y wget
RUN	apt-get install -y nginx 
RUN apt-get install -y mariadb-server
RUN apt-get -y install php php-mysql php-fpm php-cli php-mbstring php-zip php-gd

# PHPMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz
RUN tar -xzvf phpMyAdmin-5.0.2-all-languages.tar.gz -C /var/www/ 
RUN mv /var/www/phpMyAdmin-5.0.2-all-languages /var/www/phpMyAdmin 
RUN rm -rf phpMyAdmin-5.0.2-all-languages.tar.gz
RUN mv root/config.inc.php /var/www/phpMyAdmin/
RUN chown -R www-data:www-data /var/www/phpMyAdmin

# SSL
RUN openssl req -days 365 -newkey rsa:2048  -x509 -sha256 -nodes -out /etc/ssl/certs/certificate.crt \
		-keyout /etc/ssl/certs/key.key -subj '/C=RU/ST=XX/L=XX/O=XX/OU=XX/CN=born2code'

# NGINX
COPY ./srcs/nginx.conf /etc/nginx/sites-avaliable/
RUN ln -s /etc/nginx/sites-avaliable/nginx.conf /etc/nginx/sites-enabled/

# WordPress
RUN wget https://wordpress.org/latest.tar.gz 
RUN tar -xzvf latest.tar.gz -C /var/www/
RUN mv root/wp-config.php /var/www/wordpress/
RUN chown -R www-data:www-data /var/www/phpMyAdmin

# MySQL
COPY /srcs/mysql.mysql /var/
RUN service mysql start && mysql -u root mysql < /var/mysql.mysql

# Start nginx
RUN service nginx start && service php7.3-fpm start

# Start script
CMD bash root/start.sh