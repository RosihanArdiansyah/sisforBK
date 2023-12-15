# Instalasi Aplikasi Sistem Informasi BK SMKN 10 Makassar

## Download composer
Bisa di download disini 
https://getcomposer.org

## Download Git
Bisa di download disini
https://git-scm.com/downloads

cara instalasi bisa dilihat di sini
https://www.petanikode.com/git-install/

## Download XAMPP untuk menjalankan websitenya
wget https://www.apachefriends.org/xampp-files/7.4.16/xampp-linux-x64-7.4.16-0-installer.run (linux)
download di https://www.apachefriends.org/download.html (windows)

cara instalasinya bisa dilihat di sini
https://hariono.site.unwaha.ac.id/cara-menginstal-xampp-di-windows/

## Download atau clone project dari github
git clone https://github.com/RosihanArdiansyah/sisforBK.git
atau download zipnya melalui github (https://github.com/RosihanArdiansyah/sisforBK)

## Pastikan folder berada di dalam xampp/htdocs/

## Buat Database di MySQL dengan nama yang sama dengan yang ada di dalam app/Database
default name  = sisforBK

## Migrate database
php spark migrate

## Jalankan seedernya
php spark db:seed UserSeeder

php spark db:seed KelasSeeder

php spark db:seed RuleSeeder

## Terakhir jalankan webnya
php spark serve

## Panduan Login
Sebagai admin (username : admin, password : 123456)

Sebagai user (username : user, password : 123456)
