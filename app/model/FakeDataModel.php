<?php
namespace app\model;

use app\core as core;
use app\library as library;

class FakeDataModel extends core\Model
{
    //private
    private $storageList;
    private $brands;

    private function getBrandByName($name)
    {
        $index = -1;
        for ($i=0; $i < count($this->brands) && $index == -1; $i++) { 
            if ($this->brands[$i]->getName() == $name) {
                $index = $i;
            }
        }
        if ($index > -1) {
            return $this->brands[$index];
        } else {
            return false;
        }
    }

    //public
    public function loadFakeData(){
        if (!isset($_SESSION) || !isset($_SESSION['fakeData'])) {
            include_once __ROOT__.DIRECTORY_SEPARATOR."app/library/FakeData.php";
        }
        $storageList = new library\StorageList();
        $fakeData = $_SESSION['fakeData'];
        //load brands
        $brands = [];
        if (isset($fakeData['brands'])) {
            for ($i=0; $i < count($fakeData['brands']); $i++) {
                $brand = $fakeData['brands'][$i]; 
                $brands[] = new library\Brand($brand['name'], $brand['category']);
            }
        }
        $this->brands = $brands;

        //load storagees
        if (isset($fakeData['storages'])) {
            for ($i=0; $i < count($fakeData['storages']); $i++) {
                $storage = $fakeData['storages'][$i];
                $storageList->addStorage($storage['name'], $storage['addr'], $storage['capacity']); 
            }
        }
        
        //load products
        if (isset($fakeData['products'])){
            for ($i=0; $i < count($fakeData['products']); $i++) {
                $product = $fakeData['products'][$i]; 
                if ($currBrand = $this->getBrandByName($product['brand'])) {
                    $p = new library\Product($product['id'], $product['name'], $product['price'], $currBrand);
                    $storageList->addProduct($p, $product['amount']);
                }
            }
        }
        $this->storageList = $storageList;
    }

    public function getStorageList()
    {
        return ['storageList' => $this->storageList];
    }

    public function getStorageById($id)
    {
        $storage = $this->storageList->getStorageByid($id);
        return ['storage' => $storage];
    }
}
