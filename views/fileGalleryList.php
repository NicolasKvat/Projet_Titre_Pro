<?php
require_once 'views/header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?>
<div class="d-flex justify-content-center">
    <a href="?page=Ajouter-image" class="btn btn-primary text-center font-weight-bold m-4">Ajouter un image</a>
</div>
<div class="d-flex flex-md-row justify-content-center">
    <div class="col-md-9 d-flex mr-md-3 m-0 ml-0 p-0 flex-column justify-content-center" id="newsContainer">
        <div class="row d-flex justify-content-center">
            <?php
            // on affiche un message si il 'y a aucun article.
            if (empty($fileList)) {
                ?>
                <p class="text-center"><?= 'Aucune image' ?></p>
                <?php
            }
            // on affiche les données de la table `article`
            foreach ($fileList as $file) {
                ?>


                <div class="col-lg-4 my-5 py-2 d-flex flex-column align-items-center galerieContainer">
                    <a href="#" class="mx-4 justify-content-center">
                        <img class="galleryImg text-center" src="assets/uploadFile/file<?= $file->id ?>.<?= $file->picture ?>" alt="">
                    </a>
                    <a href="#" class="titleImg font-weight-bold text-center m-2"><?= $file->title ?></a>
                    <div class="d-flex flex-row">
                    <a href="?page=Modifier-image&id=<?= $file->id ?>" class="btn btn-primary font-weight-bold m-2">Modifier</a>
                    <a href="?page=Supprimer-image&id=<?= $file->id ?>" class="btn btn-danger font-weight-bold m-2">Supprimer</a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>


<?php
include_once 'footerAdminSpace.php';
?>