<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/Vignesh-GitHubreposy/Laravel9searchvue/master/public/logo.svg" width="400" alt="Laravel Logo"></a></p>

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

Postman collection file also uploaded here 

file name "Laravel9search01.postman_collection.json"

 Following are the credentials and Rest API 

 ## Login Credentials:
 Email: admin123@gmail.com
 Password: admin@123

 ## REST API  
 try using this command if any doubt

php artisan route:list


 Login API:POST http://127.0.0.1:8000/api/login

Register API:POST http://127.0.0.1:8000/api/register

Logout API:POST http://127.0.0.1:8000/api/logout

GetBooks API:GET http://127.0.0.1:8000/api/books

GetBooks By Id:GET http://127.0.0.1:8000/api/books/{book}

Create Books:POST http://127.0.0.1:8000/api/books/

Update Books:PATCH http://127.0.0.1:8000/api/books/

Delete Books:DEL http://127.0.0.1:8000/api/books/{book}

# Filter API

Search and Filter books: GET http://127.0.0.1:8000/api/v1/booksearch

for Example: http://127.0.0.1:8000/api/v1/booksearch?quantity=5&page=2

# Laravel9searchvue
