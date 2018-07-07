<?php
namespace app;

if (isset($_REQUEST)) {
    $args = $_REQUEST;
} else {
    $args = [];
}

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
    $path_split = explode('/', ltrim($path));
    if (isset($path_split[3])) {
        $contr = $path_split[1]."Controller";
        $method = $path_split[2];
        $args['url'] = [];
        for ($i=3; $i<count($path_split); $i++) {
            $args['url'][] = $path_split[$i];
        }
    } elseif (isset($path_split[2])) {
        $contr = $path_split[1]."Controller";
        $method = $path_split[2];
    } elseif (isset($path_split[1])) {
        $contr = $path_split[1]."Controller";
        $method = 'index';
    } else {
        $contr = 'IndexController';
        $metohd = 'index';
    }
} else {
    $path_split = '/';
    $contr = 'IndexController';
    $method = 'index';
}

try {
    $contr = "app\\controller\\$contr";
    $controller = new $contr();
    $controller->$method($args);
} catch (\Exception $e) {
    echo $e->getMessage(), "\n";
}
