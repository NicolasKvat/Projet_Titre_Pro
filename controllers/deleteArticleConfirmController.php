<?php

if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
}
require_once 'models/Article.php';
$Article = new Article();
$Article->setId($_GET['id']);


if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $Article->deleteArticle($id);
    header('Location: ?page=Liste-d\'articles');
    exit();
}