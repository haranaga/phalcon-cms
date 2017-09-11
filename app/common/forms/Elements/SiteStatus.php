<?php
namespace Cms\Forms\Elements;

use Phalcon\Forms\Element;

class SiteStatus extends \Phalcon\Forms\Element\Select
{
    public function __construct($elementName, $attributes = [])
    {
        $t = \Phalcon\DI::getDefault()->get('t');

        parent::__construct($elementName, [
            SITE_STATUS_VALID => $t->_('site_status_valid'),
            SITE_STATUS_INVALID => $t->_('site_status_invalid')
        ], $attributes);
    }
}
