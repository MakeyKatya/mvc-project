<?php

class Login_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function run(){

        $sth = $this->db->prepare("SELECT id,role FROM users WHERE login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('md5', $_POST['password'], HASH_KEY)
        ));
        $data = $sth->fetch();

        $count =  $sth->rowCount();
        if($count > 0){
            //login
            Session::init();
            Session::set('role',$data['role']);
            Session::set('loggedIn', true);
            Session::set('user_id', $data['id']);
            header('location: ../dashboard');
        }else{
            //echo an error
            header('location: ../login');
        }

    }

}