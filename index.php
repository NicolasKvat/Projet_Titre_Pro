<?php
// seul ces pages sont valides
$routes = [
    'Accueil' => 'controllers/actualityController.php',
    'Galerie' => 'controllers/galleryController.php',
    'À-Propos' =>'controllers/aboutUsController.php',
    'Inscription' => 'controllers/formRegisterController.php',
    'Espace-administrateur' => 'controllers/adminSpaceUserListController.php',
    'Profil-utilisateur' => 'controllers/profilUserController.php',
    'Modifier-utilisateur' => 'controllers/updateUserFormController.php',
    'Supprimer-utilisateur' => 'views/confirmDeleteUser.php',
    'Ajouter-utilisateur' => 'controllers/addUserFormController.php',
    'Liste-d\'articles' => 'controllers/articlesListController.php',
    'Ajouter-Article' => 'controllers/addArticleFormController.php',
    'Modifier-article' => 'controllers/updateArticleController.php',
    'Supprimer-article' => 'views/confirmDeleteArticle.php',
    'Détails-article' => 'controllers/detailArticleController.php',
    'Liste-d\'images' => 'controllers/fileGalleryListController.php',
    'Ajouter-image' => 'controllers/addFileFormController.php',
    'Modifier-image' => 'controllers/updateFileController.php',
    'Supprimer-image' => 'views/confirmDeleteFile.php'
];

//si un parametre page est passé dans le GET
if(isset($_GET['page'])){
    //on verifie que la clé existe dans notre tableau de routes
    if (key_exists($_GET['page'], $routes)){
        $page=$_GET['page'];
    }else{
        //si elle n'existe pas, on redirige vers la page d'accueil
        $page = 'Accueil';
    }
    //si aucun parametre page n'a été passé, c'est que l'on vient d'arriver pour la premiere fois sur le site
//on redirige vers la page d'accueil
}else{
    $page='Accueil';
}

//on appelle la page correspondante
include_once $routes[$page];