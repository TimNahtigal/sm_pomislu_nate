USE mysql;
DROP USER "root"@"localhost";
CREATE USER "root"@"localhost" IDENTIFIED BY "";
grant all privileges on *.* to "root"@"localhost";
FLUSH PRIVILEGES;
