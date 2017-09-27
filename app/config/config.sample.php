<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'debug' => true,

    'name' => 'Phalcon-CMS',

    'version' => '1.0',

    'color' => '#165762',

    'server' => [
        'frontend' => true,
        'admin' => true,
        'api' => true,
    ],

    // http schema http or https
    'http_schema' => 'http',

    // root domain site.site_domain
    'default_site_domain' => 'localhost:8080',
    // domain alias if you need for development
    'alias_site_domain' => [
        // request host  =>  site.site_domain
        'test.localhost.8080' => 'localhost:8080',
    ],

    'cookie' => 'phcms',

    // encrypt seed
    'crypt' => 'jS8nE{D$?A<uav]Kr;7M6cV%(_&xhX>Ny',

    // Mysql option
    'database' => [
        'adapter'  => 'Mysql',     // for phalcon dev-tools
        'host'     => 'localhost',
        'port'     => 3306,
        'username' => 'root',
        'password' => '',
        'dbname'   => 'phalcon-cms',
        'charset'  => 'utf8',
        'persistent' => true,
    ],

    'application' => [
        'appDir'         => APP_PATH . '/',
        'modelsDir'      => APP_PATH . '/common/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'cacheDir'       => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
        //'baseUri'        => 'http://cms.localhost:8080/',
    ],

    // User registration need email check
    'mail_check' => false,

    // User registration mail
    'mail' => [
        'driver' => 'smtp',
        'host'  => 'smtp.gmail.com',
        'port' => 465,
        'encryption' => 'ssl',
        'username'  => 'example@gmail.com',
        'password' => 'examplePassword',
        'from' => ['email' => 'example@gmail.com', 'name' => 'Phalcon-CMS Master']
    ],
    /**
     * if true, then we print a new line at the end of each CLI execution
     *
     * If we dont print a new line,
     * then the next command prompt will be placed directly on the left of the output
     * and it is less readable.
     *
     * You can disable this behaviour if the output of your application needs to don't have a new line at end
     */
    'printNewLine' => true
]);
