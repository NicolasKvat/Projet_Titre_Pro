<?php

if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
    exit();
}
include_once 'models/User.php';
$User = new User();
$UserList = $User->getAllUsers();
require_once 'views/adminSpaceUserList.php';