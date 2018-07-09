<?php
namespace app\library;

class Display extends Product
{
    private $screenType;

    public function __construct($id, $name, $price, $brand, $screenType)
    {
        parent::__construct($id, $name, $price, $brand);
        $this->screenType = $screenType;
    }

    public function __toString()
    {
        return var_dump($this);
    }
}
