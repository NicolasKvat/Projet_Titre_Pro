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
            <?php
            // Pattern de test :
            $emailPattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
            $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?])([-+!*$@%_?\w]{8,15})$/';
            //   On test chaque input en fonction de son pattern et s'il ne correspond pas on insert un message d'erreur
            //   et on réinitialise le POST afin de ne pas la garder dans le champ
            if ($_POST) {
                if (!preg_match($emailPattern, $_POST['email']) && isset($_POST['validRegister'])) {
                    $arrayOfErrors['email'] = 'Email invalide';
                    $_POST['email'] = '';
                }
                if (!preg_match($passwordPattern, $_POST['password']) && isset($_POST['validRegister'])) {
                    $arrayOfErrors['password'] = 'mot de passe invalide';
                    $_POST['password'] = '';
                }
            }
            ?>
            <!-- header -->
            <header>
                <!-- navbar -->
                <nav class="navbar d-flex flex-row justify-content-center align-items-center">
                    <div class="row navbarRow w-100 d-flex flex-row justify-content-between align-items-center">
                        <!-- logo -->
                        <div class="col-2 d-flex justify-content-center align-items-center">
                            <a class="logo text-center text-decoration-none" href="#">Logo</a>
                        </div>
                        <!-- menu items -->
                        <div class="col-md d-xl-flex d-none flex-row justify-content-around align-items-center">
                            <a href="?page=Accueil" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4">Accueil</a>
                            <a href="?page=Galerie" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4">Galerie</a>
                            <a href="?page=À Propos" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4">À propos</a>           
                            <div class="register d-flex flex-column">
                                <a href="#" class="menu-items account text-decoration-none font-weight-bold pl-4 pr-4" data-toggle="modal" data-target="#modalConnection">Mon compte</a>
                            </div>
                            <a href="#" class="don1 text-decoration-none text-center font-weight-bold pt-1 pb-1">Faire un don</a>
                        </div>
                        <!-- menu burger -->

                        <div id="wrapper" class="d-xl-none" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="circle icon">
                                <span class="line top"></span>
                                <span class="line middle"></span>
                                <span class="line bottom"></span>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav d-flex justify-content-center align-items-center">
                                <a href="index.php" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4 m-2">Accueil</a>
                                <a href="galerie.php" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4 m-2">Galerie</a>
                                <a href="about_us.php" class="menu-items text-decoration-none font-weight-bold pl-4 pr-4 m-2">À propos</a>              
                                <div class="register d-flex flex-column">
                                    <a href="#" class="menu-items account text-decoration-none font-weight-bold pl-2 pr-2 m-2" data-toggle="modal" data-target="#modalConnection">Mon compte</a>
                                </div>
                                <a href="#" class="don1 text-decoration-none text-center font-weight-bold pt-1 pb-1 m-2">Faire un don</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Modal de connexion -->
                <div class="modal fade" id="modalConnection" tabindex="-1" role="dialog" aria-labelledby="connectionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-white" id="connectionModalLabel">Connexion</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- formulaire de connection-->
                            <form name="formConnect" action="index.php" method="POST">
                                <input type="hidden" name="validRegister" value="OKAYY">
                                <div class="modal-body d-flex flex-column">
                                    <div class="form-group">
                                        <!--email-->
                                        <label for="email" class='font-weight-bold text-white'>Email</label>
                                        <input type="text" class="form-control border-0 <?= isset($arrayOfErrors['email']) ? 'is-invalid' : '' ?>" name="email" placeholder="Mon email" value="<?= $_POST['email'] ?? '' ?>" required>
                                        <span class="errorForm p-2 <?= isset($arrayOfErrors['email']) ? 'text-danger' : '' ?> font-weight-bold"><?= $arrayOfErrors['email'] ?? '' ?></span>
                                    </div>
                                    <div class='form-group'>
                                        <label class="font-weight-bold text-white" for="password">Mot de passe</label>
                                        <input type="password" name="password" class="form-control input border-0 <?= isset($arrayOfErrors['password']) ? 'is-invalid' : '' ?>" placeholder="Mon mot de passe" id="password" value="<?= $_POST['password'] ?? '' ?>" required>
                                        <span class="errorForm p-2 <?= isset($arrayOfErrors['password']) ? 'text-danger' : '' ?> font-weight-bold"><?= $arrayOfErrors['password'] ?? '' ?></span>
                                    </div>
                                    <div class="modal-footer d-flex flex-row justify-content-end p-0 border-0"> 
                                        <div class="d-flex justify-content-around">                       
                                            <a href="?page=Inscription" class="btn text-white font-weight-bold ml-0 mr-1">S'inscrire</a>  
                                            <input type="submit" class="btn text-white font-weight-bold ml-1 mr-0" value="Se connecter">   
                                        </div>                    
                                    </div>
                                </div>
                            </form>  
                        </div>       
                    </div>
                </div>
            </header>
