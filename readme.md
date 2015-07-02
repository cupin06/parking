## Smart Parking Api

### Development Enviroment

##### Prerequisite
MySQL, PHP5.5, Composer

###### Install Composer
``` 
brew install composer
```
Clone Smart Parking Repo
```
git@git.pocketpixel.com:pocket-developer/Smart-Parking-API.git
```

Create **.env** file in project root
```
touch .env
```

Use your favourite editor to copy the content below to your **.env** file
```
APP_ENV=local
APP_DEBUG=true

DB_HOST=localhost
DB_DATABASE=smartparking
DB_USERNAME=root
DB_PASSWORD=
````

Install Laravel dependency
```
composer install
```

Set Permission
```
cd app/
sudo chmod -R 777 storage/
```

Set Application Key
```
php artisan key:generate
```

### Setup Twilio SMS 

Publish default Twilio config file
```
php artisan vendor:publish
```

Get Twilio API Credential. Login into Twilio Website and go to Dashboard.
Click Show API Credentials in the right side to get ACCOUNT SID and AUTH TOKEN
Example

```
ACCOUNT_SID : AC21447b19240db593f8ec494dc52d0862
AUTH TOKEN : 657c0bfd7feb671dbb7448458df73e35
```

Get Twilio Phone Number
Click on NUMBERS Menu copy the Phone Number
```
Phone Number : +19738142990
```

Open file project_folder/config/twilio.php. Paste ACCOUNT SID, AUTH TOKEN and PHONE NUMBER in the twilio config file.


## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
