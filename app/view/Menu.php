<?php
namespace app;
//  $__cname = lcfirst(basename(__FILE__, '.php'));
//  foreach(View::$vars[$__cname] as $key=>$value){
//      $$key = $value;
//  }
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
                <LI class="nav-item"><A class="nav-link" href="<?php print BASE_URL?>">Listázás</A></LI>
                <LI class="nav-item"><A class="nav-link" href="<?php print BASE_URL?>">Új Raktár</A></LI>
            </UL>
        </DIV>
    </NAV>
    <DIV class="container" style="margin-top:30px">
