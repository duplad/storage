<?php
namespace app\core;

class View
{
    public static $vars = [];

    public function __toString()
    {
        return serialize($this);
    }
}
