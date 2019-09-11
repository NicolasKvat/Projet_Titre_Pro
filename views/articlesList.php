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
    <a href="?page=Ajouter-Article" class="btn btn-primary text-center font-weight-bold m-4">Ajouter un article</a>
</div>
<div class="d-flex flex-md-row justify-content-center">
    <div class="col-md-9 d-flex mr-md-3 m-0 ml-0 p-0 flex-column justify-content-center" id="newsContainer">
        <?php
        // on affiche un message si il 'y a aucun article.
        if (empty($articlesList)) {
            ?>
            <p class="text-center"><?= 'Aucun article' ?></p>
            <?php
        }
        // on affiche les données de la table `article`
        foreach ($articlesList as $article) {
            // on affiche les 50 premiers mots du texte de l'article
            $tab = explode(' ', $article->text, $wordNumber + 1);
            unset($tab[$wordNumber]);
            ?>

            <div class="d-flex flex-md-row flex-column justify-content-center p-0 my-4">
                <div class="d-flex justify-content-center justify-content-md-start">
                    <img class="galleryImg" src="assets/uploadArticle/Article<?= $article->id ?>.<?= $article->picture ?>" alt="">
                </div>
                <div class="news col p-0">
                    <h2 class="newsTitle font-weight-bold pl-4"><?= $article->title ?></h2>
                    <p class="newsText pl-4"><?= implode(' ', $tab) . '...' ?></p>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <a href="?page=Détails-article&id=<?= $article->id ?>" class="btn btn-primary m-2">Voir</a>
                    <a href="?page=Modifier-article&id=<?= $article->id ?>" class="btn btn-secondary m-2">Modifier</a>
                    <a href="?page=Supprimer-article&id=<?= $article->id ?>" class="btn btn-danger m-2">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php
include_once 'footerAdminSpace.php';
?>

