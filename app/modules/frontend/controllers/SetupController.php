<?php

namespace Cms\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class SetupController extends Controller
{
    public function indexAction()
    {
    }

    public function saveAction()
    {
        if ($this->request->isPost()) {
            umask(0000);
            $content = "<?php \n";
            $content .= "return [ \n";
            $content .= "\t'database' => [\n";
            foreach ($this->request->getPost() as $k => $v) {
                $content .= "\t\t'".$k."' => '".$v."',\n";
            }
            $content .= "\t]\n];";

            file_put_contents(APP_PATH . '/config/setup.php', $content);
        }
    }
}
