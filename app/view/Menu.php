<?php
namespace app;

use app\core as core;

$__cname = lcfirst(basename(__FILE__, '.php'));
if (isset(core\View::$vars[$__cname]) && core\View::$vars[$__cname]) {
    $data = core\View::$vars[$__cname];
    foreach ($data as $key => $value) {
        $$key = $value;
    }
}

?>
    <DIV class="jumbotron text-center" style="margin-bottom:0">
        <H1>Képzeletbeli Termékek</H1>
        <P>A feladat egy weboldal elkészítése</P> 
    </DIV>
    <NAV class="navbar navbar-expand-sm bg-dark navbar-dark">
        <BUTTON class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <SPAN class="navbar-toggler-icon"></SPAN>
        </BUTTON>
        <DIV class="collapse navbar-collapse" id="collapsibleNavbar">
            <UL class="navbar-nav">
                <LI class="nav-item"><A class="nav-link <?php if ($menuId == 1) { print "active"; }?>" href="<?php print BASE_URL?>">Raktárak</A></LI>
                <LI class="nav-item"><A class="nav-link <?php if ($menuId == 2) { print "active"; }?>" href="<?php print BASE_URL?>index/newstorage">Raktár Hozzáadása</A></LI>
                <LI class="nav-item"><A class="nav-link <?php if ($menuId == 3) { print "active"; }?>" href="<?php print BASE_URL?>">Termékek</A></LI>
                <LI class="nav-item"><A class="nav-link <?php if ($menuId == 4) { print "active"; }?>" href="<?php print BASE_URL?>">Termék Hozzáadása</A></LI>
            </UL>
        </DIV>
    </NAV>
    <DIV class="container" style="margin-top:30px">
