#!/bin/bash
STR=$(cat /etc/nginx/sites-avaliable/nginx-config.conf)
SUB='autoindex on'
if [[ "$STR" == *"$SUB"* ]]
then
	sed -i 's/autoindex on/autoindex off/' /etc/nginx/sites-avaliable/nginx-config.conf	
else
	sed -i 's/autoindex off/autoindex on/' /etc/nginx/sites-avaliable/nginx-config.conf
fi
service nginx restart
bash