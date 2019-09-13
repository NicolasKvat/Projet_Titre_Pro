<?php require_once 'views/header.php' ?> 

<main class="d-flex flex-column justify-content-center">
    <div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center mb-4">
        <div class="col-10">
            <h2 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Inscription</h2>
        </div>
    </div>
    <!--formulaire d'inscription-->     
<div class="row flex-column align-items-center">
    <p class='errorFormRegister font-weight-bold text-danger text-center'><?= $errorRegister ?></p>
    <form name="form" action="" method="POST" class="col-11 col-md-6 form-group p-4 mb-4">
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--nom-->
            <label for="lastName" class='font-weight-bold'>Nom :</label>
            <input type="text" class="form-control" name="lastName" value="<?= $lastName ?? "" ?>" required>
            <span class="errorFormRegister p-2 <?= isset($formError['lastName']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['lastName'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--prénom-->
            <label for="firstName" class='font-weight-bold'>Prénom :</label>
            <input type="text" class="form-control" name="firstName" value="<?= $firstName ?? "" ?>" required>
            <span class="errorFormRegister p-2 <?= isset($formError['firstName']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['firstName'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--email-->
            <label for="email" class='font-weight-bold'>Email :</label>
            <input type="text" class="form-control" name="email" value="<?= $email ?? "" ?>" required>
            <span class="errorFormRegister p-2 <?= isset($formError['email']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['email'] ?? '' ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--mot de passe-->
            <label for="passWord" class='font-weight-bold'>Mot de passe :</label>
             <small>Le mot de passe doit contenir au minimum 8 caractères avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial parmis la liste. (- + ! * $ @ % _ ?)</small>
             <input type="password" class="form-control" name="passWord" required>
            <span class="errorFormRegister p-2 <?= isset($formError['passWord']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['passWord'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <input type="hidden" name="status" value="1" required>
            <span class="errorFormRegister p-2 <?= isset($formError['status']) ? 'text-danger' : '' ?> font-weight-bold"><?= $formError['status'] ?? '' ?></span>         
        </div>
        <div class="m-3 p-0 d-flex justify-content-around">
            <a href="?page=Accueil" class="btn btn-outline-danger font-weight-bold">Retour</a>
            <input type="submit" name='registerForm' class="btn btn-outline-primary font-weight-bold mr-0" value="Envoyer"> 
            <input type="hidden" value="<?= $user->getId() ?? 0 ?>" name="id">
        </div>
    </form>
</div>
</main>
<?php require_once 'views/footer.php' ?> 