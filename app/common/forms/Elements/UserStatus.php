<?php
namespace Cms\Forms\Elements;

use Phalcon\Forms\Element;

class UserStatus extends \Phalcon\Forms\Element\Select
{
    public function __construct($elementName, $attributes = [])
    {
        $t = \Phalcon\DI::getDefault()->get('t');

        parent::__construct($elementName, [
            USER_STATUS_VALID => $t->_('user_status_valid'),
            USER_STATUS_CHECK => $t->_('user_status_check'),
            USER_STATUS_INVALID => $t->_('user_status_invalid'),
        ], $attributes);
    }
}
