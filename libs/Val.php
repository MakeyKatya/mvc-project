<?php

class Val {

    public function __construct(){

    }

    public function minLength($data, $arg){
        if(strlen($data) < $arg){
            return "Your string length should be bigger then $arg";
        }
    }

    public function maxLength($data, $arg){
        if(strlen($data) > $arg){
            return "Your string length should be less then $arg";
        }
    }

    public function digit($data){
        if(ctype_digit($data) == false){
            return "Your string must be a digit";
        }
    }

    public function __call($name, $arguments)
    {
        throw new Exception("Method <b>\"$name\"</b> does not exists inside the class");
    }

}