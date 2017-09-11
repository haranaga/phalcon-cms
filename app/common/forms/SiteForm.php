<?php
namespace Cms\Forms;

use Phalcon\Forms\Element;

class SiteForm extends FormBase
{
    public $elements = [
        'site_id' => 'Hidden',
        'site_name' => 'Text',
        'site_domain' => 'Text',
        'site_url' => 'Text',
        'site_title' => 'Text',
        'site_email' => 'Email',
        'site_description' => 'Text',
        'site_keywords' => 'Text',
        'site_created_at' => 'Text',
        'site_update_at' => 'Text',
        'site_status' => 'SiteStatus',
    ];
}
