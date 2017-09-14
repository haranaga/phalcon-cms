<?php
namespace Cms;

use Phalcon\Mvc\User\Plugin;
use Phalcon\Config;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;

class SessionPlugin extends Plugin
{
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $user = [
            'user_name' => 'guest',
            'user_email' => 'guest',
            'user_status' => USER_STATUS_INVALID,
            'user_role' => USER_ROLE_GUEST,
            'is_login' => false,
        ];
        if ($this->cookieSession->has('login')) {
            $user = unserialize($this->cookieSession->get('login'));
            if (is_array($user)) {
                $this->cookieSession->extendExpire('login', 60);
                $user['is_login'] = true;
                unset($user['user_password']);
            }
        }

        $login = new Config($user);
        $this->getDI()->set('login', $login);
        $this->view->login = $login;
    }
}
