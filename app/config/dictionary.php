<?php

return new \Phalcon\Config([
    'site_status' => [
        SITE_STATUS_INVALID => 'site_status_invalid',
        SITE_STATUS_VALID => 'site_status_valid'
    ],

    'user_role' => [
        USER_ROLE_ADMIN => 'user_role_admin',
        USER_ROLE_OWNER => 'user_role_owner',
        USER_ROLE_EDITOR => 'user_role_editor',
        USER_ROLE_BLOGGER => 'user_role_blogger',
        USER_ROLE_OPEN => 'user_role_open',
        USER_ROLE_GHOST => 'user_role_ghost',
    ],

    'user_status' => [
        USER_STATUS_VALID => 'user_status_valid',
        USER_STATUS_INVALID => 'user_status_invalid'
    ],

]);
