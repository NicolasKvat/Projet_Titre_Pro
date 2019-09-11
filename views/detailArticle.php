<?php
require_once 'controllers/detailArticleController.php';
require_once 'header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?>
<div class='d-flex flex-column align-items-center'>
    <img class="m-4" src="assets/uploadArticle/Article<?= $Article->getId() ?>.<?= $Article->getPicture() ?>">
    <p><?= $Article->getText() ?></p> 
</div>
<div class='m-4 text-center'>
    <a href="?page=Liste-d'articles" class="btn btn-outline-danger">Retour</a>
</div>
<?php
require_once 'footerAdminSpace.php';
