<?php
namespace Cms\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Cms\Models\Sites;

class SiteCreateValidation extends SiteValidation
{
    public function initialize()
    {
        parent::initialize();

        $this->add(
            "site_domain",
            new Validator\Uniqueness([
                "model"   =>  new Sites(),
                "field"  => 'site_domain',
                "except" => ["site_status" => SITE_STATUS_INVALID,],
                "message" => $this->t->_('Site domain exists', ['name' => $this->t->_('site_domain')]),
            ])
        );
    }
}
