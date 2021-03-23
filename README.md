# Moolahgo API

Web service using laravel lumen

## Server Requirements

As stated from [Lumen server requirement](https://lumen.laravel.com/docs/8.x#server-requirements).

- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- [Composer](https://getcomposer.org/) installed.
- Mysql database
- Nginx or Apache web service

## Project setup

1. open `mysql` and create new database i.e `moolahgo`
2. open terminal and go to `/moolahgo-service` directory and do `composer install`
3. open `.env` file and edit database information (db name, username and password)
4. do `php artisan migrate` in the terminal
5. finally do `php artisan db:seed` in the terminal

### Running The API

the command to run the API is `php -S [host]:[port] -t [folder to serve]`
example:

```
php -S localhost:8000 -t public
```

# Moolahgo Web

## Server Requirements

- [nodejs and npm](https://nodejs.org/en/) installed.
- [Yarn](https://classic.yarnpkg.com/en/docs/install/#windows-stable) installed
- after nodejs and npm installed, do `npm install vue` in the terminal to install vue

## Project setup

1. open terminal and go to `/moolahgo-web` directory and do `yarn install`
2. open `.env` file and edit `VUE_APP_BASE_URL` for web service host, if you use example, you can fill with `http://localhost:8000`

### Compiles and hot-reloads for development

```
yarn serve
```

### Compiles and minifies for production

```
yarn build
```

### Lints and fixes files

```
yarn lint
```
