<?php
namespace Cms\Forms;

use Phalcon\Forms\Element;

class UserForm extends FormBase
{
    public $elements = [
        'user_id' => 'Hidden',
        'user_name' => 'Text',
        'user_login' => 'Text',
        'user_display_name' => 'Text',
        'user_password' => 'Password',
        'user_email' => 'Email',
        // 'user_role' => 'Select',
        // 'user_status' => 'Select',
        // 'user_image' => 'Image',
    ];

    public function initialize($entity = null, $options = null)
    {
        parent::initialize($entity, $options);
    }
}
