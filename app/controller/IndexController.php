<?php
namespace app\controller;

use app\core as core;

class IndexController extends core\Controller
{

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu');

        $this->loadModel('app\\model\\fakeDataModel');
        $this->fakeDataModel->loadFakeData();
        $storageList = $this->fakeDataModel->getStorageList();

        $this->loadView('home', $storageList);
        $this->loadView('foot');
    }
}
