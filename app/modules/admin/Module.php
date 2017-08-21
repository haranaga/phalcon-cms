<?php
namespace Cms\Modules\Admin;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Translate\Adapter\NativeArray;

use Cms\Language;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Cms\Modules\Admin\Controllers' => __DIR__ . '/controllers/',
            'Cms\Modules\Admin\Models' => __DIR__ . '/models/',
        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * tlanslation for admin tool
         * @var Language
         */

        $di->setShared('t', function () {
            $language = new Language();
            $tlanslation = $language->getTranslation(__DIR__ . '/messages/');
        });

        /**
         * Setting up the view component
         */
        $di->set('view', function () use ($tlanslation) {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(__DIR__ . '/views/');

            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            // set tlanslation message
            $view->setVar('t', $tlanslation);
            return $view;
        });
    }
}
