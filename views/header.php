<?php
require_once 'controllers/connectUserController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
        <title>Chambly International</title>
    </head>
    <body>
        <div class="container-fluid m-0 p-0">
            <!-- header -->
            <header>
                <!-- navbar -->
                <nav class="d-flex flex-row justify-content-center align-items-center" id="navbar">
                    <div class="row navbarRow w-100 d-flex flex-row justify-content-between align-items-center">
                        <!-- logo -->
                        <div class="col-1 d-flex justify-content-center align-items-center m-2">
                            <a class="text-center text-decoration-none" href="?page=Accueil"><img src="assets/img/logo.jpg" id="logo"></a>
                        </div>
                        <!-- menu items -->
                        <div class="col-md d-xl-flex d-none flex-row justify-content-around align-items-center">
                            <a href="?page=Accueil" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4">Accueil</a>
                            <a href="?page=À-Propos" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4">À propos</a>           
                            <a href="#" class="menu-items account text-decoration-none font-weight-bold pl-4 pr-4" data-toggle="modal" data-target="#modalConnection">Mon compte</a>
                            <a href="https://www.helloasso.com/associations/association-chambly-international" class="don1 text-decoration-none text-center font-weight-bold pt-1 pb-1">Faire un don</a>
                        </div>
                        <!-- menu burger -->

                        <div id="wrapper" class="d-xl-none m-2" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="circle icon">
                                <span class="line top"></span>
                                <span class="line middle"></span>
                                <span class="line bottom"></span>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav d-flex justify-content-center align-items-center">
                                <a href="?page=Accueil" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4 m-2">Accueil</a>
                                <a href="?page=Galerie" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4 m-2">Galerie</a>
                                <a href="?page=À-Propos" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4 m-2">À propos</a>

                                <a href="#" class="menu-items account text-decoration-none font-weight-bold pl-2 pr-2 m-2" data-toggle="modal" data-target="#modalConnection">Mon compte</a>

                                <a href="https://www.helloasso.com/associations/association-chambly-international" class="don1 text-decoration-none text-center font-weight-bold pt-1 pb-1 m-2">Faire un don</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Modal de connexion -->
                <div class="modal fade" id="modalConnection" tabindex="-1" role="dialog" aria-labelledby="connectionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header">
                                <h1 class="modal-title font-weight-bold text-white" id="connectionModalLabel">Mon compte</h1>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php if (!isset($_SESSION['id'])) { ?>
                                <!-- formulaire de connection-->
                                <form name="formConnect" action="index.php" method="POST">
                                    <div class="modal-body d-flex flex-column">
                                        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
                                            <!--email-->
                                            <label for="email" class='font-weight-bold text-white'>Email :</label>
                                            <input type="text" class="form-control" name="email" value="<?= $email ?? "" ?>" required>
                                            <span class="errorFormRegister p-2 <?= isset($formError['email']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['email'] ?? '' ?></span>
                                        </div>
                                        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
                                            <!--mot de passe-->
                                            <label for="passWord" class='font-weight-bold text-white'>Mot de passe :</label>
                                            <input type="password" class="form-control" name="passWord" required>
                                            <span class="errorFormRegister p-2 <?= isset($formError['passWord']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['passWord'] ?? '' ?></span>
                                        </div>
                                        <div class="modal-footer d-flex flex-row justify-content-end p-0 border-0"> 
                                            <div class="d-flex justify-content-around">                       
                                                <a href="?page=Inscription" class="btn text-white font-weight-bold ml-0 mr-1">S'inscrire</a>  
                                                <input type="submit" name="connectionUser" class="btn text-white font-weight-bold ml-1 mr-0" value="Se connecter">   
                                            </div>                    
                                        </div>
                                    </div>
                                </form>
                                <?php
                            } else {
                                if ($_SESSION['idStatus'] == 1) {
                                    $nameStatus = 'Utilisateur';
                                } elseif ($_SESSION['idStatus'] == 2) {
                                    $nameStatus = 'Administrateur';
                                }
                                ?>
                                <div class='d-flex flex-column m-4'>
                                    <h4 class='text-white font-weight-bold my-2'>Nom :</h4>
                                    <p class="text-white text-center infoUser"><?= $_SESSION['lastName'] ?></p>
                                    <h4 class='text-white font-weight-bold my-2'>Prénom :</h4>
                                    <p class="text-white text-center infoUser"><?= $_SESSION['firstName'] ?></p>
                                    <h4 class='text-white font-weight-bold my-2'>Email :</h4>
                                    <p class="text-white text-center infoUser"><?= $_SESSION['email'] ?></p>
                                    <h4 class='text-white font-weight-bold my-2'>Status :</h4>
                                    <p class="text-white text-center infoUser"><?= $nameStatus ?></p>  
                                </div>
                                <div class="modal-footer d-flex flex-row justify-content-center p-0 border-0"> 
                                    <div class="d-flex justify-content-around">
                                        <?php if ($_SESSION['idStatus'] == 2) { ?>
                                        <a href="?page=Espace-administrateur" class="btn text-white font-weight-bold m-4">Espace admin</a>
                                        <?php } ?>
                                        <form action="" method="POST">
                                            <input class="btn text-white font-weight-bold m-4" type="submit" name="disconnect" value="Déconnexion">
                                        </form>
                                    </div>                    
                                </div>
                            <?php } ?>
                        </div>       
                    </div>
                </div>
            </header>
