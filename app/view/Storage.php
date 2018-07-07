<?php
namespace app\view;

use app\core as core;

$__cname = lcfirst(basename(__FILE__, '.php'));
foreach (core\View::$vars[$__cname] as $key => $value) {
    $$key = $value;
}

$storage = $storageList->getStorageById($id);

print "<h1>".$storage->getName()."</h1>";
print $storage->getProducts();