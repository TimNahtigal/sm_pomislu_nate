#!/bin/sh
sudo apt-get update
sudo apt-get upgrade 
sudo apt install nano -y

apt install sudo -y
sudo apt-get install wget apt-transport-https -y

apt install mysql-server -y

sudo apt install apache2 -y
sudo apt install php libapache2-mod-php php-mysql -y

sudo mysql --defaults-file=/etc/mysql/debian.cnf -e "source sqlSetup.sql"
sudo mysql --defaults-file=/etc/mysql/debian.cnf -e "source database.sql"

sudo cp -r site/* /var/www/html/
sudo rm /var/www/html/index.html -y

echo "Spletna stran je v /var/www/html/info.php"
