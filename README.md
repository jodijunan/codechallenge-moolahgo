# simple-api-lumen-vuejs

consists of 2 folders, backend for api and frontend for interface

installation steps :
- go to the backend folder, 
  - run composer install
  - rename .env.example to .env
  - change database config
  - run php artisan migrate
- copy dist forlder in frontend/dist to your webserver, ex : /var/www/html/referral
- run in browser http://localhost/referral/

there are 3 menus:
- home : for searching referral code owner
- create user : for creating dummy user
- list of referral code : for listing all referral code registered
