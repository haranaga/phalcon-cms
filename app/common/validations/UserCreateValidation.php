<?php
namespace Cms\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Cms\Models\Users;

class UserCreateValidation extends UserValidation
{
    public function initialize()
    {
        $this->add(
            "user_email",
            new Validator\Uniqueness([
                "model"   =>  new Users(),
                "field"  => ['site_id','user_email'],
                "except" => ["user_status" => USER_STATUS_INVALID,],
                "message" => $this->t->_('User exists', ['name' => $this->t->_('user_email')]),
            ])
        );

        // $this->add(
        //     "user_login",
        //     new Validator\Uniqueness([
        //         "model"   =>  new Users(),
        //         "field"  => ['site_id','user_login'],
        //         "except" => ["user_status" => USER_STATUS_INVALID],
        //         "message" => $this->t->_('User exists', ['name' => $this->t->_('user_login')]),
        //     ])
        // );
    }
}
