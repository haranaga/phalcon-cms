<?php
namespace Cms\Forms;

use Phalcon\Forms\Element;

class UserSignupForm extends FormBase
{
    public $elements = [
        'user_email' => 'Email',
        'user_password' => 'Password',
    ];
}
