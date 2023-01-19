FROM phpdockerio/php:8.2-fpm
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y install \
        nodejs npm; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Add nodejs
RUN npm install -g n
RUN n install 16
RUN n use 16
RUN chmod 777 -R /root/