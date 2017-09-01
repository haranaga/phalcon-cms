<?php
namespace Cms\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Cms\Models\Sites;

class SiteValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'site_name',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('site_name')]),
            ])
        );

        $this->add(
            'site_domain',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('site_domain')]),
            ])
        );

        $this->add(
            'site_url',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('site_url')]),
            ])
        );

        $this->add(
            'site_title',
            new Validator\PresenceOf([
                'message'=> $this->t->_('is required', ['name' => $this->t->_('site_title')]),
            ])
        );
    }
}
