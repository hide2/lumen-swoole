Dev on Mac
================
```
// Install PHP

ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
brew update
brew untap homebrew/php
brew uninstall php
brew upgrade
brew clenaup
brew prune
brew install autoconf
brew install php


// Install Composer

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer


// Install Swoole

pecl install swoole
php -m | grep swoole


// Create a new project

composer global require "laravel/lumen-installer"
composer create-project --prefer-dist laravel/lumen test
cd test
composer require "hhxsv5/laravel-s:~3.7.0" -vvv
vi bootstrap/app.php
$app->register(Hhxsv5\LaravelS\Illuminate\LaravelSServiceProvider::class);
php artisan laravels publish


// Start Server

cp .env.example .env
mkdir -p storage/logs
php bin/laravels start
ab -k -n 10000 -c 1000 http://localhost:5200/
```

Deploy on CentOS
================
```
// Install Dependencies

sudo yum -y install epel-release
sudo rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
sudo yum -y install git


// Install PHP

sudo yum install php72w php72w-devel php72w-cli php72w-common php72w-gd php72w-ldap php72w-mbstring php72w-mcrypt php72w-mysql php72w-pdo php72w-fpm php72w-pecl-redis -y


// Install Composer

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer


// Install Swoole

sudo yum install gcc gcc-c++ openssl openssl-devel
sudo pecl install swoole
sudo vi /etc/php.d/swoole.ini
extension=swoole.so
php -m | grep swoole


// Start Server

cp .env.example .env
mkdir -p storage/logs
php bin/laravels start
ab -k -n 10000 -c 1000 http://localhost:5200/
```