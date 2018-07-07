<?php
namespace app\library;

class Storage
{
    private $id;
    private $name;
    private $addr;
    private $capacity;
    private $productList;

    public function __construct($id, $name, $addr, $capacity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->addr = $addr;
        $this->capacity = $capacity;
        $this->productList = new ProductList();
    }

    public function getCurrentLoad(){
        return $this->productList->getCurrentLoad();
    }

    public function getCurrentCapacity(){
        $load = $this->productList->getCurrentLoad();
        $capacity = $this->getCapacity();
        return $capacity - $load;
    }

    public function addProduct($id, $name, $price, $brand, $amount = 1)
    {
        if (($this->getCurrentLoad() + $amount) <= $this->capacity) {
            $product = new Product($id, $name, $price, $brand);
            $this->productList->addProduct($product, $amount);
            return true;
        } else {
            return false;
        }
    }

    public function remProduct($id, $amount)
    {
        $this->productList->takeItemById($id, $amount);
    }

    public function getItemById($id)
    {
        if ($item = $this->productList->getListItemById($id)) {
            return $item->getQuantity();
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
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

    public function getAddr()
    {
        return $this->addr;
    }
    public function setAddr($addr)
    {
        $this->addr = $addr;

        return $this;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function __toString()
    {
        return var_dump($this);
    }
}
