<?php
namespace Cms\Forms;

use Phalcon\Forms\Element;

class UserSignupForm extends UserForm
{
    public function initialize($entity = null, $options = null)
    {
        $this->elements = array_merge($this->elements, [
            'user_agree' => 'Check',
            'user_password_confirm' => 'Password'
        ]);

        parent::initialize($entity, $options);

        $user_agree = $this->get('user_agree');
        $user_agree->setAttributes(['value' => 1]);
        $user_agree->setLabel($this->t->_('Agree with terms of use?', ['link'=>'#']));
        $this->add($user_agree);
    }
}
