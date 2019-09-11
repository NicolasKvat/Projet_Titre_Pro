<?php
require_once 'models/Article.php';
$Article = new Article();
$Article->setId($_GET['id']);
$Article->getArticleById();
$pageTitle = $Article->getTitle();
require_once 'views/detailArticle.php';
?>