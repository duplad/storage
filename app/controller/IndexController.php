<?php
namespace app\controller;

use app\core as core;

class IndexController extends core\Controller
{

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 1]);

        $this->loadModel('app\\model\\fakeDataModel');
        $this->fakeDataModel->loadFakeData();
        $storageList = $this->fakeDataModel->getStorageList();

        $this->loadView('home', $storageList);
        $this->loadView('foot');
    }

    public function newstorage()
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 2]);

        $this->loadModel('app\\model\\fakeDataModel');
        $this->fakeDataModel->loadFakeData();

        $this->loadView('newStorage');
        $this->loadView('foot');
    }
}
