<?php

namespace Cms\Modules\Frontend\Controllers;

use Cms\Models\Users;
use Cms\Validations;
use Cms\Forms\UserSignupForm;

class UserController extends ControllerBase
{
    public function indexAction()
    {
    }
    public function signupAction()
    {
        $validation = new Validations\UserSignupValidation();
        $form = new UserSignupForm();
        $form->setValidation($validation);

        // register
        if ($this->request->isPost()) {
            //$messages = $validation->validate($this->request->getPost());
            if (!$form->isValid($this->request->getPost())) {
                $this->flash->error('errer');
            }
        }

        $this->view->form = $form;
    }
    public function signinAction()
    {
    }
    public function tosAction()
    {
    }
}
