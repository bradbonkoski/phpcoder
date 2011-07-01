<?php

$path = dirname(dirname(__FILE__));
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
define('PATH', $path);
