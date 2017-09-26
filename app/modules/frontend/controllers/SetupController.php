<?php

namespace Cms\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\Mysql;

class SetupController extends Controller
{
    public function indexAction()
    {
    }

    public function saveAction()
    {
        if ($this->request->isPost()) {
            $database = $this->request->getPost();

            // db connect check
            try {
                $connection = new Mysql($database);
                if ($connection->connect()) {
                    echo 'connection ok';
                }
            } catch (\Exception $e) {
                $this->flash->error('Fix errors below');
                $this->flash->error($this->error_message = $e->getMessage());
                return $this->dispatcher->forward([C=>'setup', A=>'index']);
            }


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
