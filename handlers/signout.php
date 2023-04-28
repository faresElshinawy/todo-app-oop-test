<?php
session_start();
require_once "../core/Session.php";
$session = new Session();

$session->SessionDestroy();