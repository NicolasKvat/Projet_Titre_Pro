<?php
require_once 'controllers/profilUserController.php';
require_once 'header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?> 
<div class='d-flex flex-column align-items-center'>
    <h4 class='font-weight-bold mt-4 mb-2'>ID de l'utilisateur</h4>
    <p><?= $user->getId() ?></p>
    <h4 class='font-weight-bold my-2'>Nom</h4>
    <p><?= $user->getLastName() ?></p>
    <h4 class='font-weight-bold my-2'>Prénom</h4>
    <p><?= $user->getFirstName() ?></p>
    <h4 class='font-weight-bold my-2'>Email</h4>
    <p><?= $user->getEmail() ?></p>
    <h4 class='font-weight-bold my-2'>Status</h4>
    <p><?= $user->getidStatus() ?></p>  
</div>
<div class='m-4 text-center'>
    <a href="?page=Espace-administrateur" class="btn btn-outline-danger">Retour</a>
</div>
<?php require_once 'footerAdminSpace.php';