<?php

class Help_Model extends Model{

    public function __construct(){
        echo "Help Model";
    }

    public function blah(){
        return 10 + 10;
    }
}