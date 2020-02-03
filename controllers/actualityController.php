<?php
include_once 'models/Article.php';
$Article = new Article();
//on appelle la méthode pour récupérer tous les articles
$articlesList = $Article->getAllArticles();
$wordNumber = 50;
require_once 'views/actuality.php';

