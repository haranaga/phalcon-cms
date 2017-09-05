<?php

namespace Cms\Modules\Admin\Controllers;

use Cms\DataController;

class UserController extends DataController
{
    public $id     = 'user_id';
    public $model  = 'Cms\Models\Users';
    public $list   = ['user_id','user_name','user_login', 'user_email', 'user_role', 'user_status', 'site_id' ];
    public $search = ['user_name', 'user_login', 'user_email'];
    public $form   = 'Cms\Forms\UserForm';
    public $validation = 'Cms\Validations\UserValidation';
    public $default = [
        'user_status' => USER_STATUS_VALID,
        'site_id' => 0,
        'user_role' => USER_ROLE_OPEN,
    ];
    public $limit = 10;
    public $filter = [
        'user_status' => [
            'user_status_valid' => USER_STATUS_VALID,
            'user_status_invalid' => USER_STATUS_INVALID,
        ],
        'user_role' => [
            'user_role_admin' => USER_ROLE_ADMIN ,
            'user_role_owner' => USER_ROLE_OWNER ,
            'user_role_editor' => USER_ROLE_EDITOR ,
            'user_role_blogger' => USER_ROLE_BLOGGER ,
            'user_role_open' => USER_ROLE_OPEN ,
            'user_role_ghost' => USER_ROLE_GHOST ,
        ],
    ];
}
