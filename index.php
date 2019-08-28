<?php
// seul ces pages sont valides
$routes = [
    'Accueil' => 'controllers/actuController.php',
    'Galerie' => 'controllers/galleryController.php',
    'À Propos' =>'controllers/aboutUsController.php',
    'Inscription' => 'controllers/formRegisterController.php'
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
