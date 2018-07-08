<?php
namespace app\controller;

use app\core as core;

class StorageController extends core\Controller
{

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu');

        $this->loadModel('app\\model\\fakeDataModel');
        $this->fakeDataModel->loadFakeData();
        if($args && isset($args['url']) && isset($args['url'][0])){
            $id = $args['url'][0];
            $storage = $this->fakeDataModel->getStorageById($id);
			$this->loadView('storage', $storage);
        }

        $this->loadView('foot');
    }
}
