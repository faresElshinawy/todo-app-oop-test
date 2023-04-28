<?php

class Validate {

    // input required
    public function Required($input){
        if(empty($input)){
            return true;
        }else{
            return false;
        }
    }

    // input min length
    public function MinLen($input,$num){
        if(strlen($input) < $num){
            return true;
        }else{
            return false;
        }
    }

    // input max length
    public function MaxLen($input,$num){
        if(strlen($input) > $num){
            return true;
        }else{
            return false;
        }
    }

    // input is string
    public function StringCheck($input){
        if(!is_string($input)){
            return true;
        }else{
            return false;
        }
    }

    // input is numeric
    public function NumericCheck($input){
        if(!is_numeric($input)){
            return true;
        }else{
            return false;
        }
    }

    // input is integer
    public function IntegerCheck($input){
        if(!is_integer($input)){
            return true;
        }else{
            return false;
        }
    }

    // input is get/post method check
    public function MethodCheck($input){
        if($_SERVER['REQUEST_METHOD'] == $input){
            return true;
        }else{
            return false;
        }
    }
    
    // get key exists
    public function GetKey($key){
        if(isset($_GET[$key])){
            return true;
        }else{
            return false;
        }
    }

    // post key exists
    public function PostKey($key){
        if(isset($_POST[$key])){
            return true;
        }else{
            return false;
        }
    }

    // email check
    public function Email($input){
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    
    // check if file exists
    public function FileExists($path){
        if(file_exists($path)){
            return true;
        }else{
            return false;
        }
    }

    // sanitize input
    public function Sanitize($input){
        return trim(htmlspecialchars(htmlentities($input)));
    }

    // redirect
    public function Redirect($path){
        header("location:".$path);
    }

}