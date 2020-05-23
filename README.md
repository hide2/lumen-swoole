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

sudo yum install php71w php71w-devel php71w-cli php71w-common php71w-gd php71w-ldap php71w-mbstring php71w-mcrypt php71w-mysql php71w-pdo php71w-fpm php71w-pecl-redis -y


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

php bin/laravels start
ab -k -n 10000 -c 1000 http://localhost:5200/
```