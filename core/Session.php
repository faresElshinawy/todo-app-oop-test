<?php

class Session{

    public $auth;

    // authentication approve
    public function Auth(){
        $this->auth = $_SESSION['auth'];
    }

    // get session key value
    public function GetSessionValue($key){
        return $_SESSION[$key];
    }

    // put session key and value
    public function PutSessionValue($key,$value){
        $_SESSION[$key] = $value;
    }

    // set flash message
    public function SetFlashMessage($message,$name){
        $_SESSION[$name] = $message;
    }

    // call flash message
    public function CallFlashMessage($key){
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
        header("refresh:2");
        return $message;
    }

    // isset session key
    public function IssetKey($key){
        if(isset($_SESSION[$key])){
            return true;
        }else{
            return false;
        }
    }

    // get all session data
    public function AllData(){
        $data = $_SESSION;
        return $data;
    }

    // get session auth data
    public function SessionData($key,$offset){
        return $_SESSION[$key][0][$offset];
    }

    // session destroy
    public function SessionDestroy(){
        session_destroy();
        session_unset();
        header("location: ../index.php");
    }
}