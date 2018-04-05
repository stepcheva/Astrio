<?php

class MyCookie
{

    private static $instance = null;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if ((self::$instance) == null) {

            self::$instance = new MyCookie();
        }
        return self::$instance;
    }

    public function updateCookie($name, $value)
    {
        if ($this->getCookie($name)) {
            $this->setCookie($name, $value);
            return true;
        }
        return false;
    }

    public function getCookie($name)
    {
        if (isset($_COOKIE) && is_array($_COOKIE) && array_key_exists($name, $_COOKIE)) {
            return $_COOKIE[$name];
        }
        return false;
    }

    public function setCookie(
        $name,
        $value = null,
        $expire = 31556926,
        $path = null,
        $domain = null,
        $secure = null,
        $httponly = null
    ) {
        $set = setcookie($name, $value, time() + $expire, $path, $domain, $secure, $httponly);
        return $set;
    }

    public function unsetCookie($name)
    {
        if ($this->getCookie($name)) {
            $this->setCookie($name, "", time() - 3600);
            return true;
        }
        return false;
    }
}
