# COMP3385
Framework Development for Advanced Web Applications
This repository was created with the intention of storing both Assignment 1 and 2

Assignment 1 is in the path Assignment1/400008889/
Assignment 2 is in the path Assignment2/400008889/


## Configuring Environment to run Assignment 2
Import Assignmnet 2 directory into local environment into a folder that is not web accessible

Next navigate the Assignment 2 directory to autoloader.php and edit file. The file can also be changed to another suitable destination

TThe variables in the configuration file  *must* be changed to reflect local environement paths.

Inside the app folder there is an .htaccess file and index.php file.
The .htaccess file is meant to reside at the root of the web application directory. The RewriteBase should be set to the URI path of the web application. The file will implement rules so all requests under the Web application URI root will be forwarded to the index.php file that sits at the root.

The files can be moved to a web accessible directory where they could be executed. The css and js directories should be also moved/copied to the web accessible directory. Their new path should be reflected in the Configuration file.

When using the framework and app, the configuration file and autoloder must be included in the order specified. All includes were commented out to imporove portability 

### Configuration variables:
ROOT_DIR - Root directory where app, config, framework and tpl folders reside

ROOT_URI - Root URI path of web application

FRAMEWORK_DIR - Framework directory

APP_URI - URI path which routing will start from

APP_DIR - Application directory for custom code 

TPL_DIR - Template directory

CSS_DIR - CSS directory

JS_DIR - Javascript directory

HOST - Host name used for database connection

DATABASE - Database name

USERNAME - Database username credential

PASSWORD - Database Password credential





