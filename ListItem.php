<?php

namespace Storage;

class ListItem
{
    private $quantity;
    private $product;

    public function __construct($product, $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }
    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    public function incQuantity($amount = 1){
        $this->quantity += $amount;
    }
    public function decQuantity($amount = 1){
        $this->quantity -= $amount;
    }

    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }
}
