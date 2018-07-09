<?php
namespace app;

$__cname = lcfirst(basename(__FILE__, '.php'));
if (isset(core\View::$vars[$__cname]) && core\View::$vars[$__cname]) {
    $data = core\View::$vars[$__cname];
    foreach ($data as $key => $value) {
        $$key = $value;
    }
}

?>
        </DIV>
        </DIV>
        <DIV class="small text-center footer" style="margin-bottom:0">
            <P>Created By RudolA</P>
        </DIV>
    </BODY>
</HTML>
