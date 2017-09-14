<?php
namespace Cms;

use Phalcon\Config;

class CookieSession extends \Phalcon\Mvc\User\Component
{
    private $_is_started = false;
    private $_expire = 1 * 86400;
    private $_key = '_pcms';

    public function __construct()
    {
        return true;
    }

    public function start()
    {
        // 所定のCookieを取得する
        $this->_is_started = true;
        return true;
    }

    public function set($index, $value)
    {
        return $this->cookies->set($this->_key.'_'.$index, serialize($value), time() + $this->_expire, '/');
    }

    public function get($index)
    {
        if ($this->cookies->has($this->_key.'_'.$index)) {
            return unserialize($this->cookies->get($this->_key.'_'.$index));
        } else {
            return false;
        }
    }

    public function remove($index)
    {
        $cookie = $this->cookies->get($this->_key.'_'.$index);
        $cookie->delete();
    }

    public function has($index)
    {
        return $this->cookies->has($this->_key.'_'.$index);
    }


    public function setExpire($second)
    {
        $this->_expire = $second;
    }

    public function setKey($key)
    {
        $this->_key = $key;
    }

    public function extendExpire($index, $second)
    {
        $this->cookies->set($this->_key.'_'.$index, $this->cookies->get($this->_key.'_'.$index), time() + $second, '/');
    }
}
