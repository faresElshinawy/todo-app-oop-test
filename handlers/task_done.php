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

    if($validate->Required($taskid)){
        $errors = "task cannot be empty";
    }elseif($validate->NumericCheck($taskid)){
        $errors = "wrong request";
    }



    if(empty($errors)){
        $session->SetFlashMessage($conn->UpdateRecord("tasks",$taskid),"success");
        $validate->Redirect("../index.php");
    }else{
        $session->SetFlashMessage($errors,"errors");
        $validate->Redirect("../index.php");
    }


}else{
    $session->SetFlashMessage("wrong request method","errors");
    $validate->Redirect("../index.php");
}