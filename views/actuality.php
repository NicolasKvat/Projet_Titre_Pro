<?php require_once 'views/header.php' ?>  
<!-- main -->
<main class="main d-md-flex justify-content-center align-items-center flex-column">
    <!-- Bannière -->
    <div class="baniere-title w-100 mb-xl-2 d-flex justify-content-center align-items-center flex-column">
        <h1 class="title m-0 p-2 d-flex align-items-center justify-content-center text-center text-white font-weight-bold">Chambly International</h1>
        <p class="slogan m-0 text-white text-center">"Un geste pour eux, c'est un geste pour vous."</p>
    </div>
    <!-- actualité -->
    <div class="d-flex flex-md-row justify-content-center">
        <div class="col-md-9 d-flex mr-md-3 m-0 ml-0 p-0 flex-column justify-content-center" id="newsContainer">
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
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-2 p-0 ml-1 mr-2 justify-content-end twitter">
            <a class="twitter-timeline" data-width="300" data-height="1000" href="https://twitter.com/Ch_inter?ref_src=twsrc%5Etfw">Tweets by Ch_inter</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</main>
<?php require_once 'views/footer.php' ?>