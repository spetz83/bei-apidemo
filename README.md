BEI Zend Framework 2 Skeleton App
=================================

Installation
------------

Make sure you have [Vagrant](http://www.vagrantup.com) and [VirtualBox](http://www.virtualbox.org) installed on your machine.

CD into the project's vagrant directory and run `vagrant up`

(Windows Only) Next we must enable symlinks on our vagrant box. The VirtualBox bin folder must be on your machine's path:

```
VBoxManage setextradata YOURVMNAME VBoxInternal2/ SharedFoldersEnableSymlinksCreate/YOURSHAREDFOLDERNAME 1
vagrant halt
vagrant up
```

Once you are returned to the command prompt type `vagrant ssh` to access the vagrant box and continue the install.

Framework Setup
---------------

1. Setup front end pieces

```
gem install sass
sudo apt-get install nodejs-legacy
sudo apt-get install npm
```

2. Install Nodejs dependencies, where WEBROOT is the actual webroot of the project

```
cd /var/www/WEBROOT
sudo npm install (NOTE: if on windows use sudo npm install --no-bin-links)
sudo npm install -g grunt-cli
sudo npm install -g bower
bower install
```

3. Install Zend and it's dependencies

```
php composer.phar self-update
php composer.phar install
```


