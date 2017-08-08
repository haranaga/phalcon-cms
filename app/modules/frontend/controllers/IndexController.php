<?php

namespace Cms\Modules\Frontend\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setTitle('Phalcon-CMS index');
    }

    public function notfoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
    }

    public function errorAction()
    {
        $this->response->setStatusCode(500, 'Server Error');
    }
}
