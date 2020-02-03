<?php
//on vérifie si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
//    sinon on le redirige vers la page d'accueil
    header('Location: ?page=Accueil');
}
require_once 'views/validateRegister.php';