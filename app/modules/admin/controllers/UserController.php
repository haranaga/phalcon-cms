<?php

namespace Cms\Modules\Admin\Controllers;

use Cms\DataController;

class UserController extends DataController
{
    public $id     = 'user_id';
    public $model  = 'Cms\Models\Users';
    public $list   = ['user_id','user_name','user_login', 'user_email', 'user_role', 'user_status' ];
    public $search = ['user_name', 'user_login', 'user_email'];
    public $form   = 'Cms\Forms\UserForm';
    public $validation = 'Cms\Validations\UserValidation';
    public $default = [
        'user_status' => USER_STATUS_VALID,
        'site_id' => 0,
        'user_role' => USER_ROLE_OPEN,
    ];
    public $limit = 10;

    public function filter()
    {
        return [
            'user_status' => $this->d->user_status->toArray(),
            'user_role' => $this->d->user_role->toArray(),
            'user_login' => 'morita'
        ];
    }

    public function newAction()
    {
        $this->validation = 'Cms\Validations\UserCreateValidation';
        parent::newAction();
    }
}
