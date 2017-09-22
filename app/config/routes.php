<?php
use Phalcon\Mvc\Router\Group;

$router = $di->getRouter();

// setting config->server
if ($config->server->frontend) {
    // media site page
    $router->add('/:params', [ N => 'Cms\Modules\Frontend\Controllers', M => 'frontend', C => 'index', A => 'index', P => 1 ]);

    // front service
    $frontend = include APP_PATH.'/config/routes_frontend.php';
    $frontend_router = new Group([N=>'Cms\Modules\Frontend\Controllers', M=>'frontend']);
    $frontend_router->setPrefix('/_');
    foreach ($frontend  as $url => $route) {
        $frontend_router->add($url, $route);
    }
    $router->mount($frontend_router);
}

if ($config->server->admin) {
    $admin = include APP_PATH.'/config/routes_admin.php';
    $admin_router = new Group([N=>'Cms\Modules\Admin\Controllers', M=>'admin']);
    $admin_router->setPrefix('/_admin');
    foreach ($admin  as $url => $route) {
        $admin_router->add($url, $route);
    }
    $router->mount($admin_router);
}

if ($config->server->api) {
    $api = include APP_PATH.'/config/routes_api.php';
    $api_router = new Group([N=>'Cms\Modules\Api\Controllers', M=>'api']);
    $api_router->setPrefix('/_api');
    foreach ($api  as $url => $route) {
        $api_router->add($url, $route);
    }
    $router->mount($api_router);
}

$router->notFound(['controller' => 'index', 'action' => 'notfound']);
