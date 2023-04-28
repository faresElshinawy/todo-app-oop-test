<?php require_once "inc/header.php" ?>
<?php if($session->IssetKey("success")): ?>

                  <div class="alert alert-light text-success text-center" role="alert">
                    <?= $session->CallFlashMessage("success") ?>
                  </div>
                <?php endif; ?>
                <?php if($session->IssetKey("errors")): ?>                
                  <div class="alert alert-danger text-center" role="alert">
                    <?= $session->CallFlashMessage("errors") ?>
                  </div>                  
                <?php endif; ?>
<?php require_once "inc/nav.php" ?>


<?php
// $page = explode("/",$_SERVER['PHP_SELF']);
if(!$session->IssetKey("auth") && !$validate->GetKey("page") or !$session->IssetKey("auth") && $validate->GetKey("page") && $_GET['page'] != "signup"  ){
  require_once "login.php";
}elseif($validate->GetKey("page") && $_GET['page'] == "signup" && !$session->IssetKey("auth")){
  require_once "signup.php";
}elseif($session->IssetKey("auth") && !$validate->GetKey("page") or $validate->GetKey("page") && $_GET['page'] != "edittask" ){
  require_once "home.php";
}elseif($session->IssetKey("auth") && $validate->GetKey("page") && $_GET['page'] == "edittask" ){
  require_once "edittask.php";
}
?>





<?php require_once "inc/footer.php" ?>
