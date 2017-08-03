<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Cms\Models' => APP_PATH . '/common/models/',
    'Cms'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Cms\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Cms\Modules\Backend\Module' => APP_PATH . '/modules/backend/Module.php',
    'Cms\Modules\Admin\Module' => APP_PATH . '/modules/admin/Module.php',
    'Cms\Modules\Api\Module' => APP_PATH . '/modules/api/Module.php',
    'Cms\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
