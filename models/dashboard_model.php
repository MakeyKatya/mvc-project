<?php

class Dashboard_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function xhrInsert(){

        $text = $_POST['text'];
        $this->db->insert('listings',array(
            'text' => $text
        ));
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }

    public function xhrGetListings(){
        $data = $this->db->select('SELECT * FROM listings');
        echo json_encode($data);
    }

    public function xhrDeleteListings(){
        $id = $_POST['id'];
        $this->db->delete('listings',"id=$id");
        return $this->xhrGetListings();
    }

}