<?php
session_start();
require_once "../database/Database.php";
require_once "../core/Session.php";
require_once "../core/Validate.php";
require_once "../core/User.php";
$session = new Session();
$validate = new Validate();
$conn = new Database(); 


if($validate->MethodCheck("POST")){


    foreach($_POST as $key => $value){
        $$key = $validate->Sanitize($value);
    }

    $errors = '';

    if($validate->Required($task)){
        $errors = "task cannot be empty";
    }elseif($validate->StringCheck($task)){
        $errors = "task value must be of type string";
    }elseif($validate->MinLen($task,6)){
        $errors = "task value must be greater than 6 chars";
    }elseif($validate->MaxLen($task,50)){
        $errors = "task value must be smaller than 50 chars";
    }



    if(empty($errors)){
        $id = $session->SessionData('auth','Id');
        $sql = "INSERT INTO tasks (`Description`,`User_id`) VALUES ('$task','$id')";
        $session->SetFlashMessage($conn->Insert($sql),"success");
        $validate->Redirect("../index.php");
    }else{
        $session->SetFlashMessage($errors,"errors");
        $validate->Redirect("../index.php");
    }


}else{
    $session->SetFlashMessage("wrong request method","errors");
    $validate->Redirect("../index.php");
}