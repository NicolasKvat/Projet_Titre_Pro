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
    <form name="form" action="?page=Modifier-article&id=<?= $Article->getId() ?>" method="POST" enctype="multipart/form-data" class="col-11 col-md-6 form-group p-4 mb-4">
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--titre-->
            <label for="title" class='font-weight-bold'>titre de l'article :</label>
            <input type="text" class="form-control" id='title' name="title" value="<?= $Article->getTitle() ?>" required>
            <!--            on utilise une ternaire si il y a une erreur dans le titre, on met un message d'erreur en rouge-->
            <span class="errorFormRegister p-2 <?= isset($formError['title']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['title'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--texte-->
            <label for="text" class='font-weight-bold'>texte :</label>
            <textarea class="form-control" id="text" name="text" required><?= isset($text) ? $text : $Article->getText()  ?></textarea>
            <!--            on utilise une ternaire si il y a une erreur dans le texte, on met un message d'erreur en rouge-->
            <span class="errorFormRegister p-2 <?= isset($formError['text']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['text'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--image-->
            <label for="fileUpload" class='font-weight-bold'>Image :</label>
            <input type="file" name="photo" id="fileUpload">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 2 Mo.</p>
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
            <!--            on utilise une ternaire si il y a une erreur dans l'id de l'utilisateur, on met un message d'erreur en rouge-->
            <span class="errorFormRegister p-2 <?= isset($formError['idUser']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['idUser'] ?? '' ?></span>

        </div>
        <div class="m-3 p-0 d-flex justify-content-around">
            <a href="?page=Liste-d'articles" class="btn btn-outline-danger">Retour</a>
            <input type="submit" id='submitRegister' name='updateArticle' class="btn btn-outline-primary font-weight-bold mr-0" value="Envoyer">              
        </div> 
    </form>
</div>
<?php
require_once 'views/footerAdminSpace.php';
?>