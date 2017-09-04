<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// All constants definition here
require APP_PATH . '/config/constants.php';

$debug = new \Phalcon\Debug();
$debug->listen();

// try {

    /**
     * The FactoryDefault Dependency Injector automatically registers the services that
     * provide a full stack framework. These default services can be overidden with custom ones.
     */
    $di = new FactoryDefault();

    /**
     * Include general services
     */
    require APP_PATH . '/config/services.php';

    /**
     * Include web environment specific services
     */
    require APP_PATH . '/config/services_web.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Register application modules
     */
    $application->registerModules([
        'frontend' => ['className' => 'Cms\Modules\Frontend\Module'],
        'backend' => ['className' => 'Cms\Modules\Backend\Module'],
        'api' => ['className' => 'Cms\Modules\Api\Module'],
        'admin' => ['className' => 'Cms\Modules\Admin\Module'],
    ]);

    /**
     * Include routes
     */
    require APP_PATH . '/config/routes.php';

    // echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());
    echo $application->handle()->getContent();

// } catch (\Exception $e) {
//     echo $e->getMessage() . '<br>';
//     echo '<pre>' . $e->getTraceAsString() . '</pre>';
// }
