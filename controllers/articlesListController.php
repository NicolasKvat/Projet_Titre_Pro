<?php
//on vérifie si l'utilisateur est un admin ou non
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
    exit();
}
include_once 'models/Article.php';
$Article = new Article();
$articlesList = $Article->getAllArticles();
$wordNumber = 50;
require_once 'views/articlesList.php';