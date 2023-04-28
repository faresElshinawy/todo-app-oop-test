<?php

class User extends Validate{

    public $errors;
    public $userdata;

    // check name validation
    public function Name($name){
        if(Validate::Required($name)){
            $this->errors = "name is require";
        }elseif(Validate::StringCheck($name)){
            $this->errors = "name must be string";
        }elseif(Validate::MinLen($name,3)){
            $this->errors = "name must be greater than 3 chars";
        }elseif(Validate::MaxLen($name,30)){
            $this->errors = "name must be smaller than 30 chars";
        }
    }

    // check email 
    public function EmailCheck($email){
        if(Validate::Required($email)){
            $this->errors = "email is required";
        }elseif(Validate::Email($email)){
            $this->errors = "not a valid email";
        }elseif(Validate::MaxLen($email,50)){
            $this->errors = "email must be smaller than 50 chars";
        }elseif(Validate::MinLen($email,10)){
            $this->errors = "email must be greater than 10 chars";
        }
    }

    // check password
    public function Password($password){
        if(Validate::Required($password)){
            $this->errors = "password is required";
        }elseif(Validate::MaxLen($password,20)){
            $this->errors = "password must be smaller than 20 chars";
        }elseif(Validate::MinLen($password,5)){
            $this->errors = "password must be greater than 5 chars";
        }
    }

    // login check
    public function Login($email,$password,$conn){
        $sql = "SELECT * FROM Users";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            if($email == $row['Email'] && $password == $row['Password']){
                $this->userdata = $row;
                return true;
            }
        }
        $this->errors = "wrong user info";
        
    }

    // return if theres any errors
    public function Errors(){
        if(empty($this->errors)){
            return true;
        }else{
            return false;
        }
    }


}
