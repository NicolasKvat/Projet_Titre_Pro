<?php require_once 'views/header.php' ?> 

<main class="d-flex flex-column justify-content-center">
    <div class="row rowTitle m-0 border-bottom p-4 d-flex justify-content-center mb-4">
        <div class="col-10">
            <h2 class="titleOfPage d-block font-weight-bold px-4 py-2 m-4 text-white display-sm-4 text-center">Inscription</h2>
        </div>
    </div>
    <!--formulaire d'inscription-->     
    <div class="row justify-content-center">                
        <form name="form" action="?page=Inscription" method="POST" class="col-11 col-md-6 form-group p-4 mb-4">
            <div class="form-group mb-4">
                <!--nom-->
                <label for="lastname" class='font-weight-bold'>Nom :</label>
                <input type="text" class="form-control <?= isset($arrayOfErrors['lastname']) ? 'is-invalid' : '' ?>" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" required>
                <span class="errorFormRegister p-2 <?= isset($arrayOfErrors['lastname']) ? 'text-danger' : '' ?> font-weight-bold"><?= $arrayOfErrors['lastname'] ?? '' ?></span>
            </div>
            <div class="form-group mb-4">
                <!--prénom-->
                <label for="firstname" class='font-weight-bold'>Prénom :</label>
                <input type="text" class="form-control <?= isset($arrayOfErrors['firstname']) ? 'is-invalid' : '' ?>" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" required>
                <span class="errorFormRegister p-2 <?= isset($arrayOfErrors['firstname']) ? 'text-danger' : '' ?> font-weight-bold"><?= $arrayOfErrors['firstname'] ?? '' ?></span>
            </div>
            <div class="form-group mb-4">
                <!--email-->
                <label for="emailRegister" class='font-weight-bold'>Email :</label>
                <input type="text" class="form-control <?= isset($arrayOfErrors['emailRegister']) ? 'is-invalid' : '' ?>" name="emailRegister" value="<?= $_POST['emailRegister'] ?? '' ?>" required>
                <span class="errorFormRegister p-2 <?= isset($arrayOfErrors['emailRegister']) ? 'text-danger' : '' ?> font-weight-bold"><?= $arrayOfErrors['emailRegister'] ?? '' ?></span>
            </div>
            <div class="form-group mb-4 d-flex flex-column">
                <!--mot de passe-->
                <label for="passwordRegister" class='font-weight-bold'>Mot de passe :</label>
                <small>Le mot de passe doit contenir au minimum 8 caractères avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial parmis la liste. (- + ! * $ @ % _ ?)</small>
                <input type="password" class="form-control <?= isset($arrayOfErrors['passwordRegister']) ? 'is-invalid' : '' ?>" name="passwordRegister" value="<?= $_POST['passwordRegister'] ?? '' ?>" required>
                <span class="errorFormRegister p-2 <?= isset($arrayOfErrors['passwordRegister']) ? 'text-danger' : '' ?> font-weight-bold"><?= $arrayOfErrors['passwordRegister'] ?? '' ?></span>
            </div>
            <div class="p-0 d-flex justify-content-end">
                <input type="submit" name="submitRegister" id='submitRegister' class="btn font-weight-bold mr-0" value="S'inscrire">  
            </div>  
        </form>
    </div>
</main>
<?php require_once 'views/footer.php' ?> 