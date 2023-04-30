<?php
session_start();
require_once "core/Session.php";
$session = new Session();
require_once "core/Validate.php";
$validate = new Validate();
require_once "database/Database.php";
$conn = new Database(); 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class='bg-dark' data-bs-theme="light">
<script>

<?php if($session->IssetKey("success")): ?>

Swal.fire({
  icon: 'success',
  title: '<?= $session->CallFlashMessage("success") ?>',
  showConfirmButton: false,
  timer: 1500
})   

<?php endif; ?>
<?php if($session->IssetKey("errors")): ?>                

  Swal.fire({
  title: 'error!',
  text: '  <?= $session->CallFlashMessage("errors") ?> ',
  icon: 'error',
  confirmButtonText: 'ok',
  timer: 2000
      })            
<?php endif; ?>
      
  </script>