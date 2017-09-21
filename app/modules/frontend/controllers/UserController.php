<?php

namespace Cms\Modules\Frontend\Controllers;

use Cms\Models\Users;
use Cms\Validations;
use Cms\Forms\UserSignupForm;
use Cms\Forms\UserForm;

class UserController extends ControllerBase
{
    public function indexAction()
    {
    }
    
    public function signinAction()
    {
        $validation = new Validations\UserValidation();
        $form = new UserForm();
        $form->setValidation($validation);

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $user = Users::findFirst([
                    'conditions' => 'is_trash = :is_trash: and user_email = :user_email:' ,
                    'bind' => [
                        'user_email' => $this->request->getPost('user_email'),
                        'is_trash' => IS_NOT_TRASH
                    ]
                ]);
                if ($user) {
                    $this->flash->success('user exists');

                    if ($this->security->checkHash($this->request->getPost('user_password'), $user->user_password)) {
                        $this->flash->success('password correct');

                        $this->cookieSession->setExpire(600);
                        $this->cookieSession->set('login', serialize($user->toArray()));

                        // $this->flash->success('signed in');
                        // return $this->dispatcher->forward([
                        //     C => 'index',
                        //     A => 'index'
                        // ]);
                    } else {
                        $this->flash->error('password incorrect');
                    }
                } else {
                    $this->flash->error('user not exists');
                }
            } else {
                $this->flash->error('validation error');
            }
        }

        $this->view->form = $form;
    }
    public function signin_doneAction()
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
                $user->user_role = USER_ROLE_OPEN;

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
    public function tosAction()
    {
    }
}
