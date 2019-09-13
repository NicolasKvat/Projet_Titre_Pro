<?php

if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
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

if (isset($_SESSION['id'])) {

    $user->setId($_SESSION['id']);
    $user->getUserById();
}
