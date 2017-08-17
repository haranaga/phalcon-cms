<?php
use Phalcon\Mvc\Router\Group;

$router = $di->getRouter();

if ($config->server->frontend) {
    // media site page
    $router->add('/:params', [ N => 'Cms\Modules\Frontend\Controllers', M => 'frontend', C => 'index', A => 'index', P => 1 ]);

    // front service
    $frontend = include APP_PATH.'/config/routes_frontend.php';
    $frontend_router = new Group([N=>'Cms\Modules\Frontend\Controllers', M=>'frontend']);
    $frontend_router->setPrefix('/_');
    foreach ($frontend  as $url => $route) {
        $frontend_router->add($url,$route);
    }
    $router->mount($frontend_router);
}

if ($config->server->backend) {
    $backend = include APP_PATH.'/config/routes_backend.php';
    $backend_router = new Group([N=>'Cms\Modules\Backend\Controllers', M=>'backend']);
    $backend_router->setPrefix('/_backend');
    foreach ($backend  as $url => $route) {
        $backend_router->add($url,$route);
    }
    $router->mount($backend_router);
}

if ($config->server->admin) {
    $admin = include APP_PATH.'/config/routes_admin.php';
    $admin_router = new Group([N=>'Cms\Modules\Admin\Controllers', M=>'admin']);
    $admin_router->setPrefix('/_admin');
    foreach ($admin  as $url => $route) {
        $admin_router->add($url,$route);
    }
    $router->mount($admin_router);
}

if ($config->server->api) {
    $api = include APP_PATH.'/config/routes_api.php';
    $api_router = new Group([N=>'Cms\Modules\Api\Controllers', M=>'api']);
    $api_router->setPrefix('/_api');
    foreach ($api  as $url => $route) {
        $api_router->add($url,$route);
    }
    $router->mount($api_router);
}



//
// foreach ($application->getModules() as $key => $module) {
//     $namespace = preg_replace('/Module$/', 'Controllers', $module["className"]);
//     $router->add('/_'.$key.'/:params', [
//         'namespace' => $namespace,
//         'module' => $key,
//         'controller' => 'index',
//         'action' => 'index',
//         'params' => 1
//     ])->setName($key);
//     $router->add('/_'.$key.'/:controller/:params', [
//         'namespace' => $namespace,
//         'module' => $key,
//         'controller' => 1,
//         'action' => 'index',
//         'params' => 2
//     ]);
//     $router->add('/_'.$key.'/:controller/:action/:params', [
//         'namespace' => $namespace,
//         'module' => $key,
//         'controller' => 1,
//         'action' => 2,
//         'params' => 3
//     ]);
// }
//
// $router->add('/', ['controller'=>'index', 'action' => 'index']);
$router->notFound(['controller' => 'index', 'action' => 'notfound']);
