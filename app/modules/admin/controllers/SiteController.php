<?php

namespace Cms\Modules\Admin\Controllers;

use Cms\DataController;

class SiteController extends DataController
{
    public $id     = 'site_id';
    public $model  = 'Cms\Models\Sites';
    public $list   = [
        'site_id','site_name','site_domain', 'site_url', 'site_title'
     ];
    public $search = ['site_name', 'site_domain', 'site_url', 'site_title', 'site_description', 'site_keywords'];
    public $form   = 'Cms\Forms\SiteForm';
    public $validation = 'Cms\Validations\SiteValidation';
    public $default = [
        'user_id' => 10,
    ];
    public $limit = 10;

    public function filter()
    {
        return [
            'site_status' => $this->d->site_status->toArray(),
        ];
    }
    public function newAction()
    {
        $this->validation = 'Cms\Validations\SiteCreateValidation';
        parent::newAction();
    }
}
