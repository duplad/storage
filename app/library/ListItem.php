<?php
namespace app\library;

class ListItem
{
    private $quantity;
    private $product;

    public function __construct($product, $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    public function incQuantity($amount = 1)
    {
        $this->quantity += $amount;
    }
    public function decQuantity($amount = 1)
    {
        $this->quantity -= $amount;
    }

    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function __toString()
    {
        return var_dump($this);
    }
}
