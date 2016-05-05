<?php

class Note_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function noteList(){
        return $this->db
                    ->select('SELECT id, title, content,created_at
                             FROM notes WHERE user_id = :user_id',
                             array('user_id'=>$_SESSION['user_id']));
    }

    public function noteSingleList($id){
        $sth = $this->db
            ->prepare('SELECT id,title,content,created_at
                       FROM notes WHERE id = :id AND user_id = :user_id');
        $sth->execute(array(
            ':id' => $id,
            ':user_id' => $_SESSION['user_id']
            ));
        return $sth->fetch();
    }

    public function create(){
        $this->db->insert('notes', array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id'=>$_SESSION['user_id'],
            'created_at' => date("Y-m-d H:i:s")
        ));
        header('location: '.URL.'note');
    }

    public function editSave($id){
        $this->db->update('notes', array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ),"`id` = {$id} AND `user_id` = {$_SESSION['user_id']}");
        header('location: '.URL.'note');
    }


    public function delete($id){
            $this->db->delete('notes',"id = $id AND user_id = {$_SESSION['user_id']}");
            header('location: '.URL.'note');
    }

}