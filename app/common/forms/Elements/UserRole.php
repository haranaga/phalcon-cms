<?php
namespace Cms\Forms\Elements;

use Phalcon\Forms\Element;

class UserRole extends \Phalcon\Forms\Element\Select
{
    public function __construct($elementName, $attributes = [])
    {
        $t = \Phalcon\DI::getDefault()->get('t');

        parent::__construct($elementName, [
            USER_ROLE_ADMIN => $t->_('user_role_admin'),
            USER_ROLE_OWNER => $t->_('user_role_owner'),
            USER_ROLE_EDITOR => $t->_('user_role_editor'),
            USER_ROLE_BLOGGER => $t->_('user_role_blogger'),
            USER_ROLE_OPEN => $t->_('user_role_open'),
            USER_ROLE_GHOST => $t->_('user_role_ghost'),
        ], $attributes);
    }
}
