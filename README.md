# Router Simple ![alt text][logo]

[logo]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon24.png "ONSET"
[logo2]:https://i.ibb.co/yB6bdWF/24px.png "ONSET"

**Router Sipmle** is a PHP library for routing system work only with POST requests.
*Version 1.0 alfa*.


## Installation

Use the package manager [git](https://commandbox.ortusbooks.com/package-management/code-endpoints/git) to install Router Simple.
```bash
git clone router-simple
```
Or [wget](https://commandbox.ortusbooks.com/package-management/code-endpoints/git) to install Router Simple.
```bash
wget https://github/router-simple.zip
```
## Basic usage
```php
# index.php
require_once 'router.php';
use Basic\Router;
$route = new Router();
$route->add('/', 'Home Page'); // to print on page
$route->add('/data', $route->auth('data.php')); // to require file 'admin.php'
```
## Contributing
This library is primarily intended for quick execution on the server side and is by no means considered safe. Written for yourself, to use only POST requests, and a possible form of login. **In no case is it considered professional software.**

## Requirements
* PHP 7.1 or greater (version 3.x and below supports PHP 5.5+)
* jQuery 3.5.0

## Features
* Basic routing (POST) with support jQery Ajax POST requests.
* All POST requests are processed through jQery Ajax.
* Two ways to process a request from **handler.php** and function **handler()** in *Basic\Router* Class.

## POST Handler
```php
# router.php

# namespace Basic;
# Class Router;
private function handler(){
   (isset($_POST['passwd']))? setcookie('key', md5($_POST['passwd'])) : print 'Error: null;';
   (isset($_POST['logout']))? setcookie('key', '') : print 'Error: null;';
}

# or handler.php
   (isset($_POST['passwd']))? setcookie('key', md5($_POST['passwd'])) : print 'Error: null;';
   (isset($_POST['logout']))? setcookie('key', '') : print 'Error: null;';
```
## Features
* Basic routing (POST) with support jQery Ajax POST requests.
* All POST requests are processed through jQery Ajax.
* Two ways to process a request from **handler.php** and function **handler()** in *Basic\Router* Class.

## Settings
```php
- private $passwd = "21232f297a57a5a743894a0e4a801fc33"; #admin //Used md5 encryption. 
- private $encryption = "md5";  //You can use different hash();
- private $handler = "";  //If it's not file, he automatically start function handler() in Class.
- public $login_page = "Login Page.";  //Can be changed on file or 
- public $error = "Error: (404). Page don`t find.";  //You can use file or text to Error handler.  
```
## Additational usage
```php
# index.php
require_once 'router.php';
```

## Authors
* **Bohdan Pukhovskyi** - [facebook](https://www.facebook.com/bohdan.pukhovskyi)

## License 
#### [The MIT License (MIT)](https://choosealicense.com/licenses/mit/)

Copyright (c) 2016 Simon Sessingø / simple-php-router
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software
