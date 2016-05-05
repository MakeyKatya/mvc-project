<?php

require 'Val.php';
class Form {

    /**@var string $_currentItem Immediately posted data */
    private $_currentItem = null;

    /**@var array $_postData Stores the Posted Data */
    private $_postData = array();

    /**@var object $_val Validator object */
    private $_val = array();

    /**@var array $_error Holds the current form's errors */
    private $_error = array();

    /**
     * Form constructor. Instantiates the Validator class
     */
    public function __construct(){
        $this->_val = new Val();
    }

    /**
     * post This is to run $_POST
     * @param string $field Form field to post
     * @return object $this Form object
     */
    public function post($field){
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }
    /**
     * fetch Return posted data
     * @param mixed $fieldName
     * @return mixed String or array
     */
    public function fetch($fieldName = false){
        if($fieldName){
            if (isset($this->_postData[$fieldName])) {
                return $this->_postData[$fieldName];
            }else{
                return false;
            }
        }else{
            return $this->_postData;
        }
    }

    /**
     * val This is to validate
     * @param string $typeOfValidator A method from a Val class
     * @param mixed $arg Validator rule
     * @return object $this Form object
     */
    public function val($typeOfValidator, $arg = null){
        $postItem = $this->_postData[$this->_currentItem];
        if($arg == null){
            $error= $this->_val->{$typeOfValidator}($postItem);
        }else{
            $error= $this->_val->{$typeOfValidator}($postItem, $arg);
        }

        if($error){
            $this->_error[$this->_currentItem] = $error;
        }
        return $this;
    }

    /**
     * submit Handles a form a throws the Exception upon error
     * @return bool
     * @throws Exception
     */
    public function submit(){
        if(empty($this->_error)){
            return true;
        }else{
            $str = "";
            foreach($this->_error as $key => $value){
                $str .= $key.'=>'.$value."\n";
            }
            throw new Exception($str);
        }
    }

}