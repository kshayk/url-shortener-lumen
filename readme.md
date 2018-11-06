Setup the environment:
* Run "composer install" in the document root
* Create the database by running those two queries:
1. "CREATE DATABASE shorturl;" 
2. "GRANT ALL PRIVILEGES ON shorturl.* TO 'shorturl'@'localhost' IDENTIFIED BY '1a2b3c4d';"
* Run migration with "php artisan migrate" in the document root
* Run "php -S localhost:8000 -t public" in server the application
* View the application in "http://localhost:8000" in the browser
* To run tests execute "phpunit" in the document root