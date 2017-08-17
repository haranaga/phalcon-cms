<?php

namespace Cms\Modules\Api\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        // Nothing to do in Index
        $this->output(200, ['message' => 'This is '.$this->config->name]);
    }
}
