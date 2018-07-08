<?php
namespace app;

\session_start();

print_r($_REQUEST);

include_once "app/config/config.php";
include_once "app/config/autoload.php";
include_once "app/config/route.php";
