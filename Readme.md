# DB WEB INTERFACE for User Management System
## Introduction

**DB WEB INTERFACE** project is a part of Udemy Object Oriented PHP class, extended for his own needs. 
It is a server-side code storing a list of database web interface designed according to MVC pattern from scratch.
Upon running, it displays a list of registered profiles, registration/login/ and profile view/delete/edit functionality, mathching the full CRUD serverside database web application.

## Getting started

The project contains:
- dump.sql and schema.sql file for database description
- .htaccess for custom apache configuration
- config.php for GLOBAL Variables
- index.php in the root for running all MVC files 
- 'assets' folder for static css, js files if required
- 'classes' folder for Model.php(Base Model Class), Bootstrap.php (Base View Class), and Controller.php (Base Controller Class) + Messages.php(as an edition for application feedback system)
- 'models' folder with files which extend from Model.php
- 'controllers' folder with files which extend from Conroller.php
- 'views' folder which is the html files needed for the controllers and actions on request
- and this README.md

## REQUIREMENTS

1. Apache2+
2. MySQL5.7+
3. PHP7 (For compilation with PHP5 you should consider changing $_GET('page') and $_GET('total') validation to more extended syntax). Row Count can not work properly on lower versions.


## Running

You can run it loading the folder to your apache /var/www/html folder if you are on Linux. (Where you usually store php files to run on localhost)

1. Go to **config.php** file and insert your MySQL DB parameters 
2. Go to [localhost/test/](http:///localhost/test/) in your browser
3. Go to [register](http:///localhost/test/users/register/new) or click 'Register' to register new user
4. Go to [login](http:///localhost/test/users/login/username) or click 'Login' to login new user
5. Click on [View](http:///localhost/test/profiles/view/McGregory) to see the McGregory profile, or click on the 'view profile' at '/profile/1'
6. Click on 'Edit Profile' to update the your own profile
7. Click on 'Delete' on Edit View Page to Delete your profile.

## Notes
1. You can manage your entries per page by changing $reclimit variable value for pagination.
2. You are recommended to change the hashing algorithm to more secure one. Moreover, consider adding salting.
3. You should build more secure password input validation 
4. You can expand more input fields and more database table columns on your own
5. Front-End wasn't hardly considered. Develop it on your own, if needed.

## Contributors

The basic contributor of this project is Udemy.org. Visit [Object Oriented PHP](https://www.udemy.com/learn-object-oriented-php-by-building-a-complete-website/learn/v4/content) course to create your own MVC.
 The project is an open source one. Feel free to change styling and add other APIs.
email me at mamunovalisher@gmail.com for feedback and other questions.