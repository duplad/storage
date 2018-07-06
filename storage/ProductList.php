<?php

namespace Storage;

class ProductList
{
    //Private
    private $list;

    private function getListItemByIndex($index)
    {
        return $this->list[$index];
    }

    //Public
    public function __construct($list = [])
    {
        $this->list = $list;
    }

    public function findIndexById($id)
    {
        $find = false;
        $index = -1;
        for ($i=0; $i < count($this->list) && !$find; $i++)
        {
            $item = $this->list[$i]->getProduct();
            if ($item->getId() == $id)
            {
                $find = true;
                $index = $i;
            }
        }
        return $index;
    }

    public function getItemById($id)
    {
        $find = false;
        for ($i=0; $i < count($this->list) && !$find; $i++)
        {
            $item = $this->list[$i]->getProduct();
            if ($item->getId() == $id)
            {
                $find = true;
            }
        }
        if ($find)
        {
            return $item;
        } else {
            return false;
        }
    }

    public function getListItemById($id)
    {
        $index = $this->findIndexById($id);
        if($index > -1)
        {
            return $this->getListItemByIndex($index);
        } else {
            return false;
        }
    }

    public function addItem($item, $amount = 1)
    {
        if ($listItem = $this->getListItemById($item->getId()))
        {
            $listItem->incQuantity($amount);
        } else {
            $newItem = new \ListItem($item, $amount);
            $this->list[] = $newItem;
        }
    }
}
