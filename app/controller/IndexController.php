<?php
namespace app\controller;

use app\core as core;

class IndexController extends core\Controller
{

    public function index($args = false)
    {
        $this->loadModel('app\\model\\indexModel');
        $data = $this->indexModel->getFakeData();

        $this->loadView('head');
        $this->loadView('menu');
        $this->loadView('home', $data);
        $this->loadView('foot');
    }
}
