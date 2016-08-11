#!/bin/bash
mv /home/hgx/html/hzsbWechat/storage/logs/laravel.log /home/hgx/html/hzsbWechat/storage/logs/laravel-$(date -d "yesterday" +"%Y-%m-%d").log
#> /home/hgx/hzsbTest/storage/logs/laravel.log
echo "done!"