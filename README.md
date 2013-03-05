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

Create local configuration file from the distribution file:

    $ cp silex/resources/config/settings.yml-dist silex/resources/config/settings.yml

Modify the settings.yml file to reflect your needs.

Composer should create correct folder permission for silex/cache folder, but if you have problems writing to it you can change permissions manually:

    $ chmod 777 silex/cache

Start development with `silex/app.php`

Coming up soon
--------------

* Database implementation
* Seperate controller classes
