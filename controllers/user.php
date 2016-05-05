<?php

class User extends Controller {

    public function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if($logged == false || $role != 'OWNER'){
            Session::destroy();
            header('location: ../login');
            exit;
        }
    }


    public function index(){
        $this->view->title = "Users";
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }

    public function create(){
       $this->model->create();
    }

    public function edit($id){
        $this->view->title = "Edit Users";
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('user/edit');
    }

    public function editSave($id){
        $this->model->editSave($id);
    }

    public function delete($id){
        $this->model->delete($id);
    }

}