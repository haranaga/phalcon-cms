<?php

namespace Cms\Modules\Admin\Controllers;

use Cms\DataController;

class SiteController extends DataController
{
    public $id     = 'site_id';
    public $model  = 'Cms\Models\Sites';
    public $list   = [
        'site_id','site_name','site_domain', 'site_url', 'site_title', 'site_description', 'site_keywords','site_status',
        'site_description','site_created_at', 'site_update_at'
     ];
    public $search = ['site_name', 'site_domain', 'site_url', 'site_title', 'site_description', 'site_keywords'];
    public $form   = 'Cms\Forms\SiteForm';
    public $validation = 'Cms\Validations\SiteValidation';
    public $default = [
        'user_id' => 10,
    ];
    public $limit = 10;
}
