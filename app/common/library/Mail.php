<?php

namespace Cms;

use Phalcon\Mvc\User\Component;
use Phalcon\Mailer\Manager;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

class Mail extends Component
{
    private $mailer;
    private $message;

    public function __construct()
    {
        $this->mailer = new Manager($this->config->mail->toArray());
    }

    public function createMessageFromView($controller, $action, $params = array())
    {
        $this->message = $this->mailer->createMessage();

        $view = new View();
        $view->setDI($this->getDI());
        $view->setViewsDir($this->view->getViewsDir());
        $view->setPartialsDir($this->view->getPartialsDir());
        $view->registerEngines([
            '.volt'  => 'voltShared',
            '.phtml' => PhpEngine::class
        ]);

        $view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        $view->start();
        $view->setVar('t', $this->t);
        $view->setVars($params);
        $view->render($controller, $action);
        $view->finish();

        $this->message->content($view->getContent());

        return $this->message;
    }
}
