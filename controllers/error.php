<?php

class Error extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->view->title = "Error";
        $this->view->msg = 'This page does not exists';
        $this->view->render('error/index');
    }
}