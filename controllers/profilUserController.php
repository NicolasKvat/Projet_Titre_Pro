<?php
require_once 'models/Status.php';
require_once 'models/User.php';
$status = new Status();
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();
require_once 'views/profilUser.php';
?>