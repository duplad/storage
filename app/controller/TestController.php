<?php
namespace app\controller;

use app\core as core;

class TestController extends core\Controller
{

    public function __construct()
    {
        $this->loadModel('app\\model\\fakeDataModel');
        $_SESSION['fakeData'] = [];
        $this->fakeDataModel->loadFakeData();
        $this->addTwoStorage();
        $this->addBrand();
    }

    public function addTwoStorage()
    {
        $storages[] = [
            'name' => 'Pesti Raktár',
            'addr' => 'Budapest, Bécsi út',
            'capacity' => 5
        ];
        $storages[] = [
            'name' => 'Békéscsabai Raktár',
            'addr' => 'Békéscsaba, Tavasz utca',
            'capacity' => 4
        ];
        $this->fakeDataModel->addStorage($storages[0]);
        $this->fakeDataModel->addStorage($storages[1]);
    }
    public function addBrand()
    {
        $brand = [
            'name' => 'Dell',
            'category' => '5*'
        ];
        $this->fakeDataModel->addBrand($brand);
    }
    public function addProducts($x)
    {
        $product = [
            'id' => 1,
            'name' => 'Personal Computer',
            'price' => 120000,
            'brand' => 'Dell',
            'amount' => $x,
            'type' => 'Pc',
            'p' => 'KDE Neon'
        ];
        $this->fakeDataModel->addNewProduct($product);
    }

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 1]);

        $storageList = $this->fakeDataModel->getStorageList();

        $this->loadView('home', $storageList);
        $this->loadView('foot');
    }

    public function first()
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 4]);

        $this->addProducts(8);
        $this->fakeDataModel->remProductById(1, 2);
        $this->loadView('foot');
    }

    public function second()
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 5]);

        $this->addProducts(20);
        $this->loadView('foot');
    }

    public function third()
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 6]);

        $this->addProducts(8);
        $this->fakeDataModel->remProductById(1, 10);
        $this->loadView('foot');
    }
}
