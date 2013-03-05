<?php

require_once __DIR__ . '/vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app = new Application();

/**
 * Cache
 */
$app['cache.path'] = __DIR__ . '/cache';
$app['http_cache.cache_dir'] = $app['cache.path'] . '/http';

/**
 * Service providers
 */
$app->register(new Silex\Provider\HttpCacheServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Igorw\Silex\ConfigServiceProvider( __DIR__ . "/resources/config/settings.yml"));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/**
 * Locale
 */
$app['locale'] = 'en';
$app['session.default_locale'] = $app['locale'];

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallback' => $app['locale'],
    'translator.domains' => array(
        'messages' => require __DIR__ . '/resources/locales/translations.php',
    ),
));
$app['languages'] = array_keys($app['translator.domains']['messages']);

/**
 * Twig registration
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
    'twig.class_path' => __DIR__ . '/vendor/twig/lib',
));

/**
 * Layout template
 */
$app->before(function () use ($app) {
    if ($locale = $app['request']->get('locale')) {
        $app['locale'] = $locale;
    }

    $app['twig']->addGlobal('env', $app['environment']);
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.twig'));
});

/**
 * Error handler
 */
$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            return $app['twig']->render('404.twig');
            break;
        default:
            return $app['twig']->render('error.twig', array('code' => $code));
    }
});

/**
 * Controllers
 */
$app->match('/', function() use ($app) {
    return $app->redirect($app['locale']);
})->bind('home');

$app->get('/{locale}', function () use ($app) {
    $body = $app['twig']->render('index.twig');
    return new Response($body, 200, array('Cache-Control' => 's-maxage=3600, public'));
})->assert('locale',implode('|', $app['languages']));



return $app;