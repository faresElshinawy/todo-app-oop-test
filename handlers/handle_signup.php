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

    $user->Name($name);
    $user->EmailCheck($email);
    $user->Password($password);


    if($user->Errors()){
        $sql = "INSERT INTO Users (`Name`,`Email`,`Password`) VALUES ('$name','$email','$password')";
        $session->SetFlashMessage($conn->Insert($sql),"success");
        $validate->Redirect("../index.php");
    }else{
        $session->SetFlashMessage($user->errors,"errors");
        $validate->Redirect("../index.php?page=signup");
    }


}else{
    $session->SetFlashMessage("wrong request mehtod","errors");
    $validate->Redirect("../index.php?page=signup");
}