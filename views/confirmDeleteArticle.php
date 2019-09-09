<?php

require_once 'controllers/deleteArticleConfirmController.php';
require_once 'header.php';
?>
<body class="text-center">
    <div class="row justify-content-center align-items-center">
        <div class="form p-5 shadow my-5">
            <h1 class="text-danger font-weight-bold">ATTENTION !</h1>
            <h2 class="mt-5">Êtes-vous sur de vouloir supprimer l'article <strong><?= $Article->getId() ?></strong> ?</h2>
            <h3 class="mb-5">Cette action sera irréversible</h3>
            <div class="row justify-content-center pt-3">
                <div class="col-4">
                    <!--Sinon on retourne sur la page d'accueil-->
                    <a href="?page=Liste-d'articles" class="btn btn-primary btn-block font-weight-bold">NON</a>
                </div>
                <div class="col-4">
                    <!--Sinon on retourne sur la page d'accueil-->
                    <a href="?page=Supprimer-article&delete=<?= $Article->getId() ?>" class="btn btn-danger btn-block font-weight-bold">OUI</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footerAdminSpace.php';