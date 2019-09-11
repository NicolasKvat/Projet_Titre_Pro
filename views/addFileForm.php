<?php
require_once 'views/header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?>
<div class="row flex-column align-items-center">
    <form name="form" action="" method="POST" enctype="multipart/form-data" class="col-11 col-md-6 form-group p-4 mb-4">
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--titre-->
            <label for="title" class='font-weight-bold'>Titre de l'image :</label>
            <input type="text" class="form-control" id='title' name="title" required>
            <span class="errorFormRegister p-2 <?= isset($formError['title']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['title'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--image-->
            <label for="fileUpload" class='font-weight-bold'>Image :</label>
            <input type="file" name="photo" id="fileUpload">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
        </div>
        <div class="form-group">
            <label for="idUser" class='font-weight-bold'>ID de l'admin</label>
            <select name="idUser" id="idUser" class="form-control">
                <option selected disabled value="0">Choisir un id</option>

                <?php foreach ($userList as $user) { ?>
                    <option value="<?= $user->id ?>">
                        <?= $user->firstName . ' ' . $user->lastName ?>
                    </option>
                <?php } ?>
            </select>
            <span class="errorFormRegister p-2 <?= isset($formError['idUser']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['idUser'] ?? '' ?></span>

        </div>
        <div class="m-3 p-0 d-flex justify-content-around">
            <a href="?page=Espace-administrateur" class="btn btn-danger font-weight-bold">Retour</a>
            <input type="submit" id='uploadFile' name='uploadFile' class="btn btn-primary font-weight-bold mr-0" value="Envoyer">              
        </div> 
    </form>
</div>

<?php
require_once 'views/footerAdminSpace.php';
?>