<?php
namespace app\view;

use app\core as core;
use app;

$__cname = lcfirst(basename(__FILE__, '.php'));
if (isset(core\View::$vars[$__cname]) && core\View::$vars[$__cname]) {
    $data = core\View::$vars[$__cname];
    foreach ($data as $key => $value) {
        $$key = $value;
    }
}

print "<h1>Termékek</h1>";

$list = $productList->getProducts();

for ($i=0; $i < count($list); $i++) {
    $product = $list[$i]->getProduct();
    $quantity = $list[$i]->getQuantity();
    if ($i % 3 == 0) {
        print "<div class=\"row\">";
    }

    print "<div class=\"storage col-sm-4\">";
    print '<div class="storage-head">Név: </div>';
    print '<div class="storage-val">'.$product->getName().'</div>';
    print '<div class="storage-head">Mennyiség: </div>';
    print '<div class="storage-val">';
    print '<a class="btn btn-link" href="'.app\BASE_URL.'product/decload/'.$product->getId().'">-</a>';
    print $quantity;
    print '<a class="btn btn-link" href="'.app\BASE_URL.'product/incload/'.$product->getId().'">+</a></div>';
    print "</div>";

    if ($i % 3 == 2) {
        print "</div>";
    }
}
if ($i % 3 != 0) {
    print "</div>";
}
