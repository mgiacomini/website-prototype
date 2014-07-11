<?php
date_default_timezone_set('America/Sao_Paulo');
ini_set("auto_detect_line_endings", true);
ini_set('display_errors', 1);

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->add('mgiacomini', __DIR__ . '/src');

$application = new Silex\Application();

$application->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$application->register(new Silex\Provider\UrlGeneratorServiceProvider());

$application->register(new Silex\Provider\SessionServiceProvider());

$application->register(new Silex\Provider\ValidatorServiceProvider());

$application->register(new Silex\Provider\SecurityServiceProvider());

$application->register(new Silex\Provider\RememberMeServiceProvider());

$application->register(new Silex\Provider\SwiftmailerServiceProvider());

$application->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));

$app['config'] = $application->share(function(){
    return new \Respect\Config\Container(__DIR__.'/config/sample.ini');
});

$application->register(new Silex\Provider\ServiceControllerServiceProvider());
