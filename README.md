Silex Skeleton
--------------

This project is starting point for a Silex application.

Feel free to clone this project and start developing your own Silex application.

This package provides:

* HttpCacheServiceProvider
* SessionServiceProvider
* TranslationServiceProvider
* Translation routing
* TwigServiceProvider
* ConfigServiceProvider
* UrlGeneratorServiceProvider

*  HTML5 boilerplate (http://html5boilerplate.com/)
*  Skeleton CSS (http://getskeleton.com)

* No web folder
* Responsive design

Installation
------------

The recommended way to install Silex is [through
composer](http://getcomposer.org). Just create a `composer.json` file and
run the `php composer.phar install` command to install it:

    {
        "require": {
            "artur-gajewski/silex-skeleton": "dev-master"
        }
    }

Alternatively, you can clone the project:

    $ git clone git@github.com:artur-gajewski/silex-skeleton.git
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install

With Composer:
    $ artur-gajewski/silex-skeleton

Post-install procedures:

    $ chmod 777 -R silex/cache/

Start development with `silex/app.php`

Coming up soon
--------------

* Database implementation
* Seperate controller classes