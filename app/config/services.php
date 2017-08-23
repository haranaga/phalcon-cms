<?php

use Phalcon\Loader;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Db\Adapter\Pdo\Mysql;


use Cms\Language;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();
    $connection = new Mysql($config->database->toArray());
    return $connection;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Configure the Volt service for rendering .volt templates
 * append host name directory
 */
$di->setShared('voltShared', function ($view) {
    $config = $this->getConfig();
    $host = $this->getHost();

    $volt = new VoltEngine($view, $this);
    $volt->setOptions([
        'compiledPath' => function ($templatePath) use ($config,$host) {
            $basePath = $config->application->appDir;
            if ($basePath && substr($basePath, 0, 2) == '..') {
                $basePath = dirname(__DIR__);
            }

            $basePath = realpath($basePath);
            $templatePath = trim(substr($templatePath, strlen($basePath)), '\\/');

            $filename = basename(str_replace(['\\', '/'], '_', $templatePath), '.volt') . '.php';

            $cacheDir = $config->application->cacheDir;
            if ($cacheDir && substr($cacheDir, 0, 2) == '..') {
                $cacheDir = __DIR__ . DIRECTORY_SEPARATOR . $cacheDir;
            }

            $cacheDir = realpath($cacheDir);

            if (!$cacheDir) {
                $cacheDir = sys_get_temp_dir();
            }

            if (!is_dir($cacheDir . DIRECTORY_SEPARATOR . $host)) {
                @mkdir($cacheDir . DIRECTORY_SEPARATOR . $host, 0755, true);
            }

            return $cacheDir . DIRECTORY_SEPARATOR . $host . DIRECTORY_SEPARATOR . $filename;
        }
    ]);

    return $volt;
});

/**
 * tlanslation
 * @var Language
 */

$di->setShared('t', function () {
    $language = new Language();
    $tlanslation = $language->getTranslation(APP_PATH . '/common/messages/');
    return $tlanslation;
});
