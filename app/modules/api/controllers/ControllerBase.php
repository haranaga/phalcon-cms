<?php
namespace Cms\Modules\Api\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro;

class ControllerBase extends Controller
{
    public $version = 1;


    public function initialize()
    {
        // view off
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
    }

    /**
     * Default Response
     * @method defaultResponseArray
     * @return array               [description]
     */
    private function defaultResponseArray()
    {
        return [
            'version' => $this->version,
        ];
    }
    /**
     *
     * @param int $code
     * @param array $content
     */
    protected function output($code, $status = true, $content=array())
    {
        $content['success'] = $status;
        $content = array_merge($this->defaultResponseArray(), $content);

        // Header
        $this->response->setContentType('application/json')
                       ->setStatusCode($code, null)
                       ->sendHeaders();
        // Body
        $this->response->setJsonContent($content)
                       ->send();
    }

    public function notFoundAction()
    {
        $this->output(404, ['notfound']);
    }
}
