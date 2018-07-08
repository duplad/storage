<?php
namespace app\library;

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

    private function getStorageByCapacity($amount)
    {
        $respond = [];
        $left = $amount;
        for ($i=0; $i < count($this->storages) && $left; $i++) {
            $storage = $this->storages[$i];
            $capacity = $storage->getCurrentCapacity();
            if ($capacity >= $left) {
                $respond[] = [
                    'storageIndex' => $i,
                    'amount' => $left
                ];
                $left = 0;
            } elseif($capacity > 0) {
                $respond[] = [
                    'storageIndex' => $i,
                    'amount' => $capacity
                ];
                $left -= $capacity;
            }
        }
        if ($left > 0) {
            throw new \Exception("Not enought storage space!", 1);
            return false;
        } else {
            return $respond;
        }
    }

    private function getStorageByItemId($id, $amount)
    {
        $respond = [];
        $left = $amount;
        for ($i=0; $i < count($this->storages) && $left; $i++) { 
            $storage = $this->storages[$i];
            $load = $storage->getItemById($id);
            if ($load >= $left) {
                $respond[] = [
                    'storageIndex' => $i,
                    'amount' => $left
                ];
                $left = 0;
            } elseif($load > 0) {
                $respond[] = [
                    'storageIndex' => $i,
                    'amount' => $load
                ];
                $left -= $load;
            }
        }
        if ($left > 0) {
            throw new \Exception("Not enought item!", 1);
            return false;
        } else {
            return $respond;
        }
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
            throw new \Exception("Storage already exist", 1);
            return false;
        }
        $storage = new Storage($id, $name, $addr, $capacity);
        $this->storages[] = $storage;
        $this->totalCapacity += $capacity;
        return true;
    }

    public function getStorageById($id){
        $find = -1;
        for ($i=0; $i < count($this->storages) && $find == -1; $i++) {
            if ($this->storages[$i]->getId() == $id) {
                $find = $i;
            }
        }
        return $this->storages[$find];
    }

    public function addProduct($product, $amount = 1)
    {
        try{
            $storages = $this->getStorageByCapacity($amount);
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
            return false;
        }
        for ($i=0; $i < count($storages); $i++) { 
            $index = $storages[$i]['storageIndex'];
            $this->storages[$index]->addProduct($product, $storages[$i]['amount']);
            $this->totalCapacity -= $storages[$i]['amount'];
        }
        return true;
    }

    public function remProductById($id, $amount = 1)
    {
        try{
            $storages = $this->getStorageByItemId($id, $amount);
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
            return false;
        }
        for ($i=0; $i < count($storages); $i++) { 
            $index = $storages[$i]['storageIndex'];
            $this->storages[$index]->remProduct($id, $storages[$i]['amount']);
            $this->totalCapacity += $storages[$i]['amount'];
        }
        return true;
    }

    public function __toString()
    {
        $respond = '';
        for ($i=0; $i < count($this->storages); $i++) {
            if($i % 3 == 0){
				$respond .= "<div class=\"row\">";
			} 
            $respond .= "<div class=\"storage col-sm-4\">".$this->storages[$i]."</div>";
            if ($i % 3 == 2) {
				$respond .= "</div>";
			}
        }
        if($i % 3 != 0){
			$respond .= "</div>";
        }
        return $respond;
    }
}
