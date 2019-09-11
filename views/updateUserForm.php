<?php
require_once 'header.php';
?>
<div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center border-0">
    <div class="col-10">
        <h1 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Espace administrateur</h1>
    </div>
</div>
<?php require_once 'navbarAdminSpace.php'; ?>
<div class="row flex-column align-items-center">
    <p class='errorFormRegister font-weight-bold text-danger text-center'><?= $errorRegister ?></p>
    <form name="form" action="" method="POST" class="col-11 col-md-6 form-group p-4 mb-4">
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--nom-->
            <label for="lastName" class='font-weight-bold'>Nom :</label>
            <input type="text" class="form-control" name="lastName" value="<?=isset($formError['lastName']) ? '' : $user->getLastName() ?? ''; ?>" required>
            <span class="errorFormRegister p-2 <?= isset($formError['lastName']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['lastName'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--prénom-->
            <label for="firstName" class='font-weight-bold'>Prénom :</label>
            <input type="text" class="form-control" name="firstName" value="<?=isset($formError['firstName']) ? '' :  $user->getFirstName() ?? ''; ?>" required>
            <span class="errorFormRegister p-2 <?= isset($formError['firstName']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['firstName'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--email-->
            <label for="email" class='font-weight-bold'>Email :</label>
            <input type="text" class="form-control" name="email" value="<?=isset($formError['email']) ? '' :  $user->getEmail() ?? ''; ?>" required>
            <span class="errorFormRegister p-2 <?= isset($formError['email']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['email'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <label for="status" class='font-weight-bold'>Status</label>
            <select name="status" id="status" class="form-control">
                <option selected disabled value="0">Choisir un status</option>
                <?php foreach ($statusList as $status) { ?>
                    <option value="<?= $status->idStatus ?>">
                        <?= $status->name ?>
                    </option>
                <?php } ?>
            </select>
            <span class="errorFormRegister p-2 <?= isset($formError['status']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['status'] ?? '' ?></span>
            
        </div>
        <div class="m-3 p-0 d-flex justify-content-around">
            <a href="?page=Espace-administrateur" class="btn btn-outline-danger font-weight-bold">Retour</a>
            <input type="submit" name='updateForm' class="btn btn-outline-primary font-weight-bold mr-0" value="Envoyer"> 
            <input type="hidden" value="<?= $user->getId() ?? 0 ?>" name="id">
        </div>
    </form>
</div>
<?php require_once 'footerAdminSpace.php';