<?php
namespace Cms\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Cms\Models\Users;

class UserSignupValidation extends UserValidation
{
    public function initialize()
    {
        parent::initialize();

        $this->add(
            "user_email",
            new Validator\Uniqueness([
                "model"   =>  new Users(),
                "field"  => ['site_id','user_email'],
                "except" => ["is_trash" => IS_TRASH,],
                "message" => $this->t->_('User exists', ['name' => $this->t->_('user_email')]),
            ])
        );

        $this->add(
            'user_password_confirm',
            new Validator\PresenceOf([
                'message' => $this->t->_('is required', ['name' => $this->t->_('user_password_confirm')]),
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
    }
}
