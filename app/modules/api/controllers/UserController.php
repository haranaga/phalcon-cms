<?php

namespace Cms\Modules\Api\Controllers;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PasswordStrength;

class UserController extends ControllerBase
{
    public function checkPasswordStrengthAction()
    {
        if ($this->request->isPost()) {
            $validation = new Validation();
            $validation->add(
                'user_password',
                new PasswordStrength([
                    'minScore' => 2,
                    'message' => $this->t->_('Password strength weak'),
                    'allowEmpty' => false,
                ])
            );

            $messages = $validation->validate($this->request->getJsonRawBody());
            if (count($messages)) {
                $mes = [];
                foreach ($messages  as $message) {
                    array_push($mes, $message->getMessage());
                }
                $content = ['messages' => $mes];
                $this->output(200, false, $content);
            } else {
                $content = ['messages' => [$this->t->_('Password strength strong')]];
                $this->output(200, true, $content);
            }
        } else {
            $this->output(404, false);
        }
    }
}
