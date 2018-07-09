<?php
namespace app\view;

use app\core as core;

$__cname = lcfirst(basename(__FILE__, '.php'));
if (isset(core\View::$vars[$__cname]) && core\View::$vars[$__cname]) {
    $data = core\View::$vars[$__cname];
    foreach ($data as $key => $value) {
        $$key = $value;
    }
}

print "<h1>".$storage->getName()."</h1>";
print $storage->getProductHtml();
