<?php
namespace Cms\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Cms\Models\Users;

class UserSignupValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'user_login',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('user_login')]),
            ])
        );

        $this->add(
            'user_email',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('user_email')]),
            ])
        );

        $this->add(
            'user_email',
            new Validator\Email([
                'message'=> $this->t->_('is email format', ['name' => $this->t->_('user_email')]),
            ])
        );

        $this->add(
            'user_password',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('user_password')]),
            ])
        );

        $this->add(
            'user_login',
            new Validator\Regex([
                'pattern'=>'/[0-9a-zA-Z_\.\@\-]+/',
                'message'=> $this->t->_('is alphanumeric characters', ['name'=>$this->t->_('user_login')]).' or ( . _ @ - )',
            ])
        );

        $this->add(
            'user_password_confirm',
            new Validator\PresenceOf([
                'message' => $this->t->_('is required', ['name' => $this->t->_('user_password_confirm')]),
            ])
        );
        $this->add(
            'user_password',
            new Validator\Confirmation([
                'message'=>$this->t->_('not match', ['a' => $this->t->_('user_password'), 'b' => $this->t->_('user_password_confirm') ]),
                'with' => 'user_password_confirm',
            ])
        );

        $this->add(
            'user_password_confirm',
            new Validator\Confirmation([
                'message'=>$this->t->_('not match', ['a' => $this->t->_('user_password_confirm'), 'b' => $this->t->_('user_password') ]),
                'with' => 'user_password',
            ])
        );
        $this->add(
            'user_agree',
            new Validator\Regex([
                'pattern'=>'/1/',
                'message'=> $this->t->_('Please agree', ['name'=>$this->t->_('user_agree')]),
            ])
        );

        // Uniquness はDBで更新状況を確認して行う
        // $this->add(
        //     "user_login",
        //     new Validator\Uniqueness([
        //         "model"   =>  Users::findFirst(),
        //         "except" => ["is_valid" => IS_VALID_INVALID,],
        //         "message" => $this->dictionary->model->user_login."はすでに他のユーザーで使用されています",
        //     ])
        // );
    }
}
