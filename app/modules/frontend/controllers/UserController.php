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
            if ($form->isValid($this->request->getPost())) {
                $user = new Users();
                $user->assign($this->request->getPost());
                $user->user_status = USER_STATUS_VALID;
                $user->site_id = 0;

                try {
                    if ($user->save()) {
                        // success
                        $this->flash->success($this->t->_('Success signup'));
                        return $this->dispatcher->forward([C=>'user',A=>'signup_done']);
                    }
                    $form->setModelMessages($user->getMessages());
                } catch (\Exception $e) {
                    var_dump($e);
                    exit;
                }
            }
            $this->flash->error($this->t->_('You have error'));
        }

        $this->view->form = $form;
    }
    public function signup_doneAction()
    {
    }
    public function signinAction()
    {
    }
    public function tosAction()
    {
    }
}
