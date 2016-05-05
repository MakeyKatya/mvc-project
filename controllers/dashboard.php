<?php

class Dashboard extends Controller {

    public function __construct(){
        parent::__construct();
        Session::handleLogin();

        $this->view->js = array('../views/dashboard/js/default.js');
    }

    public function index(){
        $this->view->title = "Dashboard";
        $this->view->render('dashboard/index');
    }

    public function logout(){
        Session::destroy();
        header('location: ../login');
        exit;
    }

    public function xhrInsert(){
        $this->model->xhrInsert();
    }

    public function xhrGetListings(){
        $this->model->xhrGetListings();
    }

    public function xhrDeleteListings(){
        $this->model->xhrDeleteListings();
    }

}