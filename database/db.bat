@echo off
set copyDate=%date:~5,2%-%date:~8,2%-%date:~0,4% 
if exist %~dp0"/lb_last.sql" rename  %~dp0"/lb_last.sql"   "lb_%copyDate%_%random%.sql"
e:\phpnow\MySQL-5.1.42\bin\mysqldump -uroot -proot  -R    --add-drop-table   --default-character-set=utf8  lb_last>%~dp0"lb_last.sql"
echo "complete";
pause