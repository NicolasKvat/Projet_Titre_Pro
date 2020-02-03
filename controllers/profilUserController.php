<?php
//on vérifie si l'utilisateur est un admin ou non
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
//sinon on le redirige vers la page d'accueil
    header('Location: ?page=Accueil');
    exit();
}
require_once 'models/Status.php';
require_once 'models/User.php';
$status = new Status();
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();
require_once 'views/profilUser.php';
?>