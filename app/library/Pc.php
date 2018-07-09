<?php
namespace app\library;

class Pc extends Product
{
    private $osType;

    public function __construct($id, $name, $price, $brand, $osType)
    {
        parent::__construct($id, $name, $price, $brand);
        $this->osType = $osType;
    }
}
