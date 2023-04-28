<?php
session_start();
require_once "../database/Database.php";
require_once "../core/Session.php";
require_once "../core/Validate.php";
require_once "../core/User.php";
$session = new Session();
$validate = new Validate();
$conn = new Database(); 
$user = new User(); 


if($validate->MethodCheck("POST")){


    foreach($_POST as $key => $value){
        $$key = $validate->Sanitize($value);
    }

    $user->EmailCheck($email);
    $user->Password($password);
    $user->Login($email,$password,$conn->conn);

    if($user->Errors()){
        $session->SetFlashMessage("signed in successfully","success");
        $session->PutSessionValue("auth",[$user->userdata]);
        $validate->Redirect("../index.php");
    }else{
        $session->SetFlashMessage($user->errors,"errors");
        $validate->Redirect("../index.php?page=signin");
    }


}else{
    $session->SetFlashMessage("wrong request mehtod","errors");
    $validate->Redirect("../index.php?page=signin");
}