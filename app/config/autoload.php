<?php
namespace app;

spl_autoload_register(function ($name) {

    $namePart = explode("app\\", $name);
    $name = $namePart[count($namePart)-1];
    $parts = explode('\\', $name);
    $parts[count($parts)-1] = ucfirst($parts[count($parts)-1]);
    $file = __ROOT__.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $parts).".php";

    if (file_exists($file)) {
        if (is_readable($file)) {
            require_once $file;
        } else {
            throw new \Exception("$file file does not readable.");
        }
    } else {
        throw new \Exception("$file file does not exists.");
    }
});
