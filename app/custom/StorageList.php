<?php
namespace app\custom;

class StorageList
{

    //private
    private $storages = [];
    private $totalCapacity = 0;

    private function getNextId()
    {
        $nextId = 0;
        for ($i = 0; $i < count($this->storages); $i++) {
            $aktId = $this->storages[$i]->getId();
            if ($aktId > $nextId) {
                $nextId = $aktId;
            }
        }
        $nextId ++;
        return $nextId;
    }

    //public
    public function isExist($id)
    {
        $find = false;
        for ($i=0; $i < count($this->storages) && !$find; $i++) {
            if ($this->storages[$i]->getId() == $id) {
                $find = true;
            }
        }
        return $find;
    }

    public function addStorage($name, $addr, $capacity, $id = -1)
    {
        if ($id == -1) {
            $id = $this->getNextId();
        } elseif ($this->isExist($id)) {
            throw new Exception("Storage already exist", 1);
            return false;
        }
        $storage = new \storage\Storage($id, $name, $addr, $capacity);
        $this->storages[] = $storage;
        $this->totalCapacity += $capacity;
        return true;
    }

    public function __toString()
    {
        return var_dump($this);
    }
}
