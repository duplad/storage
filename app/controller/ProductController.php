<?php
namespace app\controller;

use app\core as core;

class ProductController extends core\Controller
{

    public function __construct(){
        $this->loadModel('app\\model\\fakeDataModel');
        $this->fakeDataModel->loadFakeData();
    }

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 3]);

        $productList = $this->fakeDataModel->getProductList();
        // if($args && isset($args['url']) && isset($args['url'][0])){
        //     $id = $args['url'][0];
        //     $storage = $this->fakeDataModel->getStorageById($id);
		// 	$this->loadView('storage', $storage);
        // }
        $this->loadView('product', ['productList' => $productList]);
        $this->loadView('foot');
    }

    public function decload($args = false){
        if ($args && isset($args['url']) && isset($args['url'][0])) {
            $id = $args['url'][0];
            $this->fakeDataModel->remProductById($id);
        }
        $this->index();
    }

    public function incload($args = false){
        if ($args && isset($args['url']) && isset($args['url'][0])) {
            $id = $args['url'][0];
            $this->fakeDataModel->addProductById($id);
        }
        $this->index();
    }

    public function newproduct($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu', ['menuId' => 3]);

        $this->loadModel('app\\model\\fakeDataModel');
        $this->fakeDataModel->loadFakeData();
        // if($args && isset($args['url']) && isset($args['url'][0])){
        //     $id = $args['url'][0];
        //     $storage = $this->fakeDataModel->getStorageById($id);
		// 	$this->loadView('storage', $storage);
        // }
        $this->loadView('product', [1 => '1']);
        $this->loadView('foot');
    }
}
