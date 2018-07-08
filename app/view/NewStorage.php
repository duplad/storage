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

?>
<H1>Raktár Hozzáadása</H1>

<div class="form-div">
    <form action="/" method="post" name="newStorage">
        <div class="form-group">
            <label for="name">Név:</label>
            <input type="text" class="form-control" id="name">
        </div>
    
        <div class="form-group">
            <label for="addr">Cím:</label>
            <input type="text" class="form-control" id="addr">
        </div>

        <div class="form-group">
            <label for="capacity">Kapacitás:</label>
            <input type="number" class="form-control" id="capacity">
        </div>
        <input type="submit" class="btn btn-info" value="Rögzítés">
    </form>
</div>
