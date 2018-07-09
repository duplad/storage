<?php
namespace app\library;

class ProductList
{
    //Private
    private $list = [];

    private function getListItemByIndex($index)
    {
        return $this->list[$index];
    }

    //Public
    public function getCurrentLoad()
    {
        $load = 0;
        for ($i=0; $i < count($this->list); $i++) { 
            $load += $this->list[$i]->getQuantity();
        }
        return $load;
    }

    public function findIndexById($id)
    {
        $find = false;
        $index = -1;
        for ($i = 0; $i < count($this->list) && !$find; $i ++) {
            $item = $this->list[$i]->getProduct();
            if ($item->getId() == $id) {
                $find = true;
                $index = $i;
            }
        }
        return $index;
    }

    public function getItemById($id)
    {
        $find = false;
        for ($i = 0; $i < count($this->list) && !$find; $i++) {
            $item = $this->list[$i]->getProduct();
            if ($item->getId() == $id) {
                $find = true;
            }
        }
        if ($find) {
            return $item;
        } else {
            return false;
        }
    }

    public function getListItemById($id)
    {
        $index = $this->findIndexById($id);
        if ($index > -1) {
            return $this->getListItemByIndex($index);
        } else {
            return false;
        }
    }

    public function addProduct($product, $amount = 1)
    {
        if ($listItem = $this->getListItemById($product->getId())) {
            $listItem->incQuantity($amount);
        } else {
            $newItem = new ListItem($product, $amount);
            $this->list[] = $newItem;
        }
    }

    public function takeItemById($id, $amount = 1)
    {
        $index = $this->findIndexById($id);
        if ($index > -1) {
            $listItem = $this->getListItemByIndex($index);
            $remain = $listItem->getQuantity() - $amount;
            if ($remain < 0) {
                throw new \Exception("Not enought item to take", 1);
                return false;
            } else {
                $listItem->decQuantity($amount);
                return true;
            }
        } else {
            throw new \Exception("Item not found", 1);
            return false;
        }
    }
    public function deleteItemById($id)
    {
        $index = $this->findIndexById($id);
        if ($index > -1) {
            array_splice($this->list, $index, 1);
            return true;
        } else {
            throw new \Exception("Item not found", 1);
            return false;
        }
    }

    public function getProducts()
    {
        return $this->list;
    }

    public function __toString()
    {
        $respond = '';
        for ($i=0; $i < count($this->list); $i++) { 
            $item = $this->list[$i];
            $respond .= $item;
        }
        return $respond;
    }
}
