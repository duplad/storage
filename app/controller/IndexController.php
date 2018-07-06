<?php

class IndexController extends Controller
{

    public function index($args = false)
    {
        $this->loadView('head');
        $this->loadView('menu');
        $this->loadView('home');
        $this->loadView('foot');
    }
}
