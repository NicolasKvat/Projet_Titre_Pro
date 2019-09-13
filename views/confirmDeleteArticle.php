<?php
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
}
require_once 'controllers/deleteArticleConfirmController.php';
require_once 'header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?>
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
    <?php
    require_once 'footerAdminSpace.php';
    