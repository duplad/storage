<?php
namespace app\view;

use app\core as core;

$__cname = lcfirst(basename(__FILE__, '.php'));
foreach (core\View::$vars[$__cname] as $key => $value) {
    $$key = $value;
}

print "<H1>Hello World!</H1>";

print_r($storageList);