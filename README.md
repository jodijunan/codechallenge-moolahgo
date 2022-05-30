# Referral Code Rest API Project

## Setup Instructions

1. Initiate docker compose
    ```sh
    $ docker-compose up
    ```

2. Then enter into app container
    ```sh
    $ docker exec -it referralcode_main_1 sh
    ```

3. In the app container execute command below for creating db schema and relationship 
    ```sh
    $ php artisan migrate
    ```
4. Then still in the app container execute command below for seeding database
    ```sh
    $ php artisan db:seed --class=UsersTableSeeder
    $ php artisan db:seed --class=OwnersTableSeeder
    $ php artisan db:seed --class=ReferralCodesTableSeeder
    ```

5. Then the API ready to use by using postman or curl in terminal as follows:
    ```sh
    curl --location --request GET 'http://localhost:8000/api/process' \
    --header 'Content-Type: application/json' \
    --data-raw '{
        "referralcode": "ABCD"
    }'
    ```
    API response:
    ```sh
    {
        "status": "Success",
        "message": null,
        "data": {
            "user": {
                "id": 1,
                "firstname": "John",
                "lastname": "Doe",
                "email": "Ysxx1m8d4G@yopmail.com",
                "created_at": "2022-05-30T08:57:52.000000Z",
                "updated_at": "2022-05-30T08:57:52.000000Z"
            },
            "owner": {
                "id": 1,
                "created_at": "2022-05-30T08:58:59.000000Z",
                "updated_at": "2022-05-30T08:58:59.000000Z",
                "user_id": 1
            },
            "referralcode": {
                "id": 2,
                "code": "ABCD",
                "created_at": "2022-05-30T08:59:11.000000Z",
                "updated_at": "2022-05-30T08:59:11.000000Z",
                "owner_id": 1
            }
        }
    }
    ```

## Pre-populated referral code data
```sh
ABCD
EFGH
IJKL
```

## SQL Query for retrieving user details
```sh
select u.*,  rc.code as referralcode
from users u 
left join owners o on o.user_id = u.id
left join referral_codes rc on rc.owner_id = o.id
where rc.code = 'ABCD'
```
Query result:
```sh
+----+-----------+----------+------------------------+---------------------+---------------------+--------------+
| id | firstname | lastname | email                  | created_at          | updated_at          | referralcode |
+----+-----------+----------+------------------------+---------------------+---------------------+--------------+
|  1 | John      | Doe      | Ysxx1m8d4G@yopmail.com | 2022-05-30 08:57:52 | 2022-05-30 08:57:52 | ABCD         |
+----+-----------+----------+------------------------+---------------------+---------------------+--------------+
```