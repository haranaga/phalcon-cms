<?php

namespace Cms\Modules\Frontend\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setTitle('Phalcon-CMS index');
        $this->cookieSession->set('hoge', '1234');
        $this->cookieSession->set('poge', '1234');
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
