<?php

require_once 'MyCookie.php';

MyCookie::getInstance()->setCookie("user","Ivanov");

MyCookie::getInstance()->getCookie("user");

MyCookie::getInstance()->updateCookie("user", "Petrov");

MyCookie::getInstance()->unsetCookie("user");

