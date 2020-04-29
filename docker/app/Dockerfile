FROM centos:7

MAINTAINER Alvarez Diego

RUN yum update -y \
    && yum -y install epel-release \
    && rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
    && yum --enablerepo=remi-php73 -y install php \
    && yum --enablerepo=remi-php73 -y install php-pdo php-mcrypt php-cli php-json php-curl php-mysql php-ldap php-zip php-fileinfo php-fpm php-soap php-mbstring php-xml php-bcmath php-memcached php-imap php-pgsql php-xdebug \
    && yum install wget -y && yum install which -y && yum install nano -y yum install git -y \
    && yum -y install nginx \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php-fpm \
    && yum install -y supervisor  \
    && yum install -y gcc-c++ make \
    && curl --silent --location https://rpm.nodesource.com/setup_12.x | bash -  \
    && yum install -y nodejs \
    && npm install --global bower \
    && npm install -g serverless

ENV current_os=linux

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

ADD nginx/nginx.conf /etc/nginx/nginx.conf
ADD nginx/whatsapp.conf /etc/nginx/conf.d/whatsapp.conf
ADD supervisord.ini /etc/supervisord.d/supervisord.ini
ADD php/php-fpm/www.conf /etc/php-fpm.d/www.conf
ADD php/php-fpm/php-fpm.conf /etc/php-fpm.conf
ADD php/php.ini /etc/php.ini

CMD ["supervisord", "-c", "/etc/supervisord.conf"]
