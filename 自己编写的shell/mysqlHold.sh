#!/bin/bash
#echo "bajian begin"
#*/5 * * * * /usr/local/mysql/mysqlHold.sh
pgrep mysqld &> /dev/null
if [ $? -gt 0 ]
then
echo "`date` mysql stoped" >> /var/log/mysql_listen.log
service mysql start
else
echo "`date` mysql running" >> /var/log/mysql_listen.log
fi