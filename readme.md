## Ora Laravel Code Challenge

Information about this project can be found [here](http://docs.oracodechallenge.apiary.io/#introduction/submission)

## Requirements

* PHP >= 7.1.2
* Composer >= 1.5
* MySQL Workbench or some other equivalent

## Installation

Clone or download this repository into a directory of your choosing.

Open a command prompt at the project root and run:

    laravel new
    
Followed by

    composer update

This will set up your project and install all the necessary dependencies.

Next create a SQL database inside of MySQL Workbench or whatever application you decide to use.

Navigate to app/config/database.php and find the line:
    
    'database' => env('DB_DATABASE', 'laravel_db'),

And change 'laravel_db' to the name of your SQL database. 
Also change any other information like username and password that are necessary to access your database.

Finally run:

    php artisan serve
    
and navigate to localhost:8000 in your browser.


## Credits

Created by: Riley Byrnes