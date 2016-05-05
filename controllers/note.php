<?php

class Note extends Controller{

    public function __construct(){
        parent::__construct();
        Session::handleLogin();
    }

    public function index(){
        $this->view->title = "Notes";
        $this->view->noteList = $this->model->noteList();
        $this->view->render('note/index');
    }

    public function create(){
        $this->model->create();
    }

    public function edit($id){
        $this->view->title = "Edit Users";
        $this->view->note = $this->model->noteSingleList($id);
        $this->view->render('note/edit');
    }

    public function editSave($id){
        $this->model->editSave($id);
    }

    public function delete($id){
        $this->model->delete($id);
    }
}