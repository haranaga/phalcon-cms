<?php

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Direct as Flash;

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router(false);

    $router->setDefaultModule('frontend');
    $router->removeExtraSlashes(true);

    return $router;
});

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
* Set the default namespace for dispatcher
*/
$di->setShared('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $eventsManager = $this->getShared('eventsManager');

    // error handling
    $eventsManager->attach(
        "dispatch:beforeException",
        function ($event, $dispatcher, $exception) {
            switch ($exception->getCode()) {
                case Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                    $dispatcher->forward(['controller' => 'index', 'action' => 'notfound', ]);
                    return false;
                    break;
                default:
                    $dispatcher->forward(['controller' => 'index', 'action' => 'error', ]);
                    return false;
                    break;
            }
        }
    );

    $dispatcher->setDefaultNamespace('Cms\Modules\Frontend\Controllers');
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});
