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

Clone the project into your desired folder:

    $ git clone git@github.com:artur-gajewski/silex-skeleton.git
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install

Composer creates correct access rights to silex/cache folder, but if you have problems writing to it you can chnage access right manually:

    $ chmod 777 silex/cache

Start development with `silex/app.php`

Coming up soon
--------------

* Database implementation
* Seperate controller classes
