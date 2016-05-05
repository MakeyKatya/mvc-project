<?php

class Session {

    public static function init(){
        @session_start();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function destroy(){
        session_destroy();
    }

    /**
     * Check if user is logged in
     */
    public static function handleLogin () {

        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false){
            Session::destroy();
            header('location: ../login');
            exit;
        }
    }

}