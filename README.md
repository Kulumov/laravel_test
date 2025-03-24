Project requirements:
php 8 or above
composer 2.8.4

1) download and unarchive the project
open the project folder in the command line

2) install all the necessary dependencues using:
composer install

3) rename the .env.example to .env

4) run php artisan key:generate

5) make the necessary migrations using
php artisan migrate
command

6) Then seed the database with the command below:
php artisan db:seed

7) Finally, you can run the project:
php artisan serve

There are two api endpoints

1. /api/news returns info about all the news
2. api/news/{id} returns info of the entry with the id specified
