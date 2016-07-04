#!/bin/bash
cp /home/xsk/etc/log/nginx/xsk.error /home/xsk/etc/log/nginx/xsk.error-$(date -d "yesterday" +"%Y%m%d")
cat /dev/null > /home/xsk/etc/log/nginx/xsk.error

cp /home/xsk/etc/log/nginx/xsk.access /home/xsk/etc/log/nginx/xsk.access-$(date -d "yesterday" +"%Y%m%d")
cat /dev/null > /home/xsk/etc/log/nginx/xsk.access

service mysqld restart
service httpd restart