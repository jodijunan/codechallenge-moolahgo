# codechallenge-moolahgo

# How to run these projects

Open your terminal (command line interface)

You should download this project on github 
1. type (cli)> git clone https://github.com/rabkawork/codechallenge-moolahgo.git
2. type (cli)> cd codechallenge-moolahgo
3. type (cli)> git checkout develop 

# Microservice

1. type (cli)> cd codechallenge-moolahgo\microservice\
2. type (cli)> composer install 
3. type (cli)> create database in your mysql database server 
4. type (cli)> cp .env.example .env and config this file
```
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={your_database}
DB_USERNAME={username}
DB_PASSWORD={password}

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```
5. type (cli)> php artisan migrate (database migration)
6. type (cli)> php artisan db:seed (create referral code data) 
7. type (cli)> php -S localhost:8000 -t public (run the api)

# Webclient
1. type (cli)> cd codechallenge-moolahgo\frontend\
2. copy this file index.php into your webserver
3. browser (address) > http://{your_web_server_address}/index.php 
 

The Task
--------
There are 2 parts to the task.
1. To write a micro service using PHP (vanilla PHP, CI or Lumen only).
2. To write a simple mobile responsive web client to consume the micro service.

The Micro Service
-----------------
The micro service will have 1 REST endpoint, /process. It will take a json value and process it. It will return the result in json as well.
The json will contain the following info: referralcode.

What the "process" endpoint do is to find the owner of the referralcode and return the detail of the owner. In real application, this owner detail will be stored in a db table. However, for this challenge, please create a model with a pre-populated value. Please put a code in comment on how to do that in sql as well. 

The Web Client
--------------
You will create a MOBILE RESPONSIVE web form for user to key in a referral code. This input is required and the referral code should be 6 characters, only contain alphanumeric, all in upper case.

There will be a submit button that is automatically enable/disable based on whether the mandatory fields are populated and valid.

When user submit the form, display a wait icon, submit using ajax to the microservice, and then display the result.

The Process
-----------
- Create a branch from this repository.
- Do all your work, make sure they run correctly in your own environment.
- Push your final work and create a pull request.
- If possible please provide us a link so that we can test your work.
- Otherwise, let us know how to setup your work so that we test it in our own workspace.

What We Are Looking For In This Test
------------------------------------
- Logic, thought process and the ability to pick up new things to complete a job.
- Completeness. We want to see that you are able to get to the final result at the same time covering all the possible edge cases and error checking.
- Simplicity. We want simple codes so maintenance is not a nightmare. This application description maybe long, but the code is simple. There are many libraries out there to help you do the job. Use them.

Hints and Suggestions (optional)
--------------------------------
You can safely skip this part.

If mobile responsiveness, data binding, or ajax are new to you, below are some suggested library you can look into to help you:
- Twitter bootstrap (https://getbootstrap.com/) - for mobile responsive
- Vue (https://vuejs.org/) - for data binding, error checking and ajax
- Jquery (https://jquery.com/) - for data binding, error checking and ajax
