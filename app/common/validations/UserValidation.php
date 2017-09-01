<?php
namespace Cms\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Cms\Models\Users;

class UserValidation extends Validation
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
            "user_email",
            new Validator\Uniqueness([
                "model"   =>  new Users(),
                "field"  => ['site_id','user_email'],
                "except" => ["user_status" => USER_STATUS_INVALID,],
                "message" => $this->t->_('User exists', ['name' => $this->t->_('user_email')]),
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
            "user_login",
            new Validator\Uniqueness([
                "model"   =>  new Users(),
                "field"  => ['site_id','user_login'],
                "except" => ["user_status" => USER_STATUS_INVALID,],
                "message" => $this->t->_('User exists', ['name' => $this->t->_('user_login')]),
            ])
        );
    }
}
