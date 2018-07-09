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

    public function __construct()
    {
        if (!isset($_SESSION) || !isset($_SESSION['fakeData'])) {
            include_once __ROOT__.DIRECTORY_SEPARATOR."app/library/FakeData.php";
        }
    }

    public function loadFakeData()
    {
        $storageList = new library\StorageList();
        if (isset($_SESSION['fakeData'])) {
            $fakeData = $_SESSION['fakeData'];
        } else {
            $fakeData = [];
        }
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
        if (isset($fakeData['products'])) {
            for ($i=0; $i < count($fakeData['products']); $i++) {
                $product = $fakeData['products'][$i];
                if ($currBrand = $this->getBrandByName($product['brand'])) {
                    $type = "app\\library\\".$product['type'];
                    $p = new $type($product['id'], $product['name'], $product['price'], $currBrand, $product['p']);
                    $storageList->addProduct($p, $product['amount']);
                }
            }
        }
        $this->storageList = $storageList;
    }

    public function addStorage($args)
    {
        $this->storageList->addStorage($args['name'], $args['addr'], $args['capacity']);
        $_SESSION['fakeData']['storages'][] = [
            'name' => $args['name'],
            'addr' => $args['addr'],
            'capacity' => $args['capacity']
        ];
    }


    public function addBrand($args)
    {
        if (isset($_SESSION) && isset($_SESSION['fakeData']) && isset($_SESSION['fakeData']['brands'])) {
            $_SESSION['fakeData']['brands'][] = $args;
        } elseif (isset($_SESSION) && isset($_SESSION['fakeData'])) {
            $_SESSION['fakeData']['brands'] = [];
            $_SESSION['fakeData']['brands'][] = $args;
        } else {
            $_SESSION['fakeData'] = [];
            $_SESSION['fakeData']['brands'] = [];
            $_SESSION['fakeData']['brands'][] = $args;
        }
        $brand = new library\Brand($args['name'], $args['category']);
        $this->brands[] = $brand;
    }

    public function addNewProduct($args) //$id, $name, $price, $brand, $p
    {
        $currBrand = $this->getBrandByName($args['brand']);
        $type = "app\\library\\".$args['type'];
        $p = new $type($args['id'], $args['name'], $args['price'], $currBrand, $args['p']);
        if ($this->storageList->addProduct($p, $args['amount'])) {
            if (isset($_SESSION) && isset($_SESSION['fakeData']) && isset($_SESSION['fakeData']['products'])) {
                $_SESSION['fakeData']['products'][] = $args;
            } elseif (isset($_SESSION) && isset($_SESSION['fakeData'])) {
                $_SESSION['fakeData']['products'] = [];
                $_SESSION['fakeData']['products'][] = $args;
            } else {
                $_SESSION['fakeData'] = [];
                $_SESSION['fakeData']['products'] = [];
                $_SESSION['fakeData']['products'][] = $args;
            }
        }
    }

    public function addProductById($id, $amount = 1)
    {
        $products = $_SESSION['fakeData']['products'];
        for ($i=0; $i < count($products); $i++) {
            if ($products[$i]['id'] == $id) {
                if ($currBrand = $this->getBrandByName($products[$i]['brand'])) {
                    $type = "app\\library\\".$products[$i]['type'];
                    $product = new $type(
                        $products[$i]['id'],
                        $products[$i]['name'],
                        $products[$i]['price'],
                        $currBrand,
                        $products[$i]['p']
                    );
                    if ($this->storageList->addProduct($product, $amount)) {
                        $_SESSION['fakeData']['products'][$i]['amount'] += $amount;
                    }
                }
            }
        }
    }

    public function remProductById($id, $amount = 1)
    {
        if ($this->storageList->remProductById($id, $amount)) {
            $products = $_SESSION['fakeData']['products'];
            for ($i=0; $i < count($products); $i++) {
                if ($products[$i]['id'] == $id) {
                    $_SESSION['fakeData']['products'][$i]['amount'] -= $amount;
                }
            }
        }
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

    public function getProductList()
    {
        return $this->storageList->getProductList();
    }
}
