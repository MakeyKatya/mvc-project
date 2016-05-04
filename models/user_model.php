<?php

class User_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList(){
        return $this->db->select('SELECT id,login,role FROM users');
    }

    public function userSingleList($id){
        $sth = $this->db->prepare('SELECT id, login, role FROM users WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function create(){
        $this->db->insert('users', array(
            'login' => $_POST['login'],
            'password' => Hash::create('md5', $_POST['password'], HASH_KEY),
            'role' => $_POST['role']
        ));
        header('location: '.URL.'user');
    }

    public function editSave($id){
        $this->db->update('users', array(
            'login' => $_POST['login'],
            'password' => Hash::create('md5', $_POST['password'], HASH_KEY),
            'role' => $_POST['role']
        ),"`id` = {$id}");
        header('location: '.URL.'user');
    }


    public function delete($id){
        $role = $this->db->select('SELECT role FROM users WHERE id=:id', array('id' => $id));
        if($role[0]['role'] == 'OWNER'){
            header('location: '.URL.'user');
        }else{
            $this->db->delete('users',"id = $id");
            header('location: '.URL.'user');
        }
    }

}