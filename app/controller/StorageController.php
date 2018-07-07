<?php
namespace app\controller;

use app\core as core;

class StorageController extends core\Controller
{

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu');

        $this->loadModel('app\\model\\indexModel');
        $data = $this->indexModel->getFakeData();

        if($args && isset($args['url']) && isset($args['url'][0])){
			$data['id'] = $args['url'][0];
			$this->loadView('storage', $data);
        }

        $this->loadView('foot');
    }
}
