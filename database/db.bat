@echo off
set copyDate=%date:~5,2%-%date:~8,2%-%date:~0,4% 
e:\phpnow\MySQL-5.1.42\bin\mysqldump -uroot -proot -R  lb_cn>"E:\phpnow\htdocs\lb\database\lb_cn_%copyDate%_%random%.sql"

e:\phpnow\MySQL-5.1.42\bin\mysqldump -uroot -proot -R  lb_cn>"E:\phpnow\htdocs\lb\database\lb_cn.sql"

e:\phpnow\MySQL-5.1.42\bin\mysqldump -uroot -proot -R  lb_en>"E:\phpnow\htdocs\lb\database\lb_en.sql"

echo "ok"
pause