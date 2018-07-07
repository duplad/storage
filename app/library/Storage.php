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

    public function getProducts()
    {
        $respond = '<div class="row"><div class="col">';
        $respond .= $this->productList;
        $respond .= '</div></div>';
        return $respond;
    }

    public function __toString()
    {
        $respond = '<div class="storage-head">Név: </div>';
        $respond .= '<div class="storage-val">'.$this->getName().'</div>';
        $respond .= '<div class="storage-head">Cím: </div>';
        $respond .= '<div class="storage-val">'.$this->getAddr().'</div>';
        $respond .= '<div class="storage-head">Kapacitás: </div>';
        $respond .= '<div class="storage-val">'.$this->getCapacity().'</div>';
        $respond .= '<div class="storage-head">Foglalt: </div>';
        $respond .= '<div class="storage-val">'.$this->getCurrentLoad().'</div>';
        $respond .= '<div class="storage-btn"><a class="" href="storage/index/'.$this->getId().'">Készlet</a></div>';

        return $respond;
    }
}
