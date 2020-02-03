<?php
//on vérifie si l'utilisateur est un admin ou non
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
    exit();
}
require_once 'models/User.php';
$user = new User();
$user->setId($_GET['id']);

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $user->deleteUser($id);
    header('Location: ?page=Espace-administrateur');
    exit();
}
