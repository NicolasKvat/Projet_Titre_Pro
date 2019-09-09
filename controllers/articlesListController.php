<?php
include_once 'models/Article.php';
$Article = new Article();
$articlesList = $Article->getAllArticles();
$wordNumber = 50;
require_once 'views/articlesList.php';