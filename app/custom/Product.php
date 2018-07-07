<?php
namespace app\custom;

class Product
{
    protected $id;
    protected $name;
    protected $price;
    protected $brand;

    public function __construct($id, $name, $price, $brand)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function __toString()
    {
        return var_dump($this);
    }
}
