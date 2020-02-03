<?php
//on vérifie si l'utilisateur est un admin ou non
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
//    sinon on le redirige vers la page d'accueil
    header('Location: ?page=Accueil');
    exit();
}
include_once 'models/User.php';
$User = new User();
$UserList = $User->getAllUsers();
require_once 'views/adminSpaceUserList.php';