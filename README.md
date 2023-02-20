<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel9searchVue
 Laravel9searchVue has book search api, only logged in admin can perform create,edit,update,delete operation whereas guest user can search list of books and retriview as REST API JSON Data.
## Implementation

Since following files missing which is ignored by git while import
/node_modules
/public/build
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.env.production
.phpunit.result.cache
Homestead.json
Homestead.yaml
auth.json
npm-debug.log
yarn-error.log
/.fleet
/.idea
/.vscode

to retrive this

create .env file and add add database name as 'Laravel9searchVue'

npm install

php artisan vendor:publish

npm run dev

To Retrive db data, try following commands

php artisan db:seed
or
php artisan tinker

Book::factory()->times(200)->create();






 Following are the credentials and Rest API 

 ## Login Credentials:
 Email: admin123@gmail.com
 Password: admin@123

 ## REST API  



# Laravel9searchvue
