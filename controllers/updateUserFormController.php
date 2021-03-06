<?php
//on vérifie si l'utilisateur est un admin ou non
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
//    sinon on le redirige vers la page d'accueil
    header('Location: ?page=Accueil');
    exit();
}
require_once 'models/Status.php';
require_once 'models/User.php';
$status = new Status();
$statusList = $status->getAllStatus();
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();
// pattern pour la vérification du formulaire
$emailPattern = '/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/';
$stringPattern = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,60}$/';
$passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?])([-+!*$@%_?\w]{8,15})$/';
//   On test chaque input en fonction de son pattern et si ils ne correspondent pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
$formError = [];
$errorRegister = '';
if (isset($_POST['updateForm'])) {
    // Si le champs lastName est vide
    if (empty($_POST['lastName'])) {
        $formError['lastName'] = 'Veuillez entrer un nom.';
        // Si le lastName est incorrect
    } elseif (!preg_match($stringPattern, $_POST['lastName'])) {
        $formError['lastName'] = 'Veuillez entrer un nom valide.';
        // Si le lastName est correct
    } else {
        $lastName = trim($_POST['lastName']);
    }
    // Si le champs firstName est vide
    if (empty($_POST['firstName'])) {
        $formError['firstName'] = 'Veuillez entrer un prénom.';
        // Si le firstName est incorrect
    } elseif (!preg_match($stringPattern, $_POST['firstName'])) {
        $formError['firstName'] = 'Veuillez entrer un prénom valide.';
        // Si le firstName est correct
    } else {
        $firstName = trim($_POST['firstName']);
    }
    // Si le champs email est vide
    if (empty($_POST['email'])) {
        $formError['email'] = 'Veuillez entrer un email.';
        // Si le email est incorrect
    } elseif (!preg_match($emailPattern, $_POST['email'])) {
        $formError['email'] = 'Veuillez entrer un email valide.';
        // Si le email est correct
    } else {
        $email = trim($_POST['email']);
    }
    // Si le champs status est vide
    if (!is_numeric($_POST['status']) || $_POST['status'] < 1 || $_POST['status'] > 2) {
        $formError['status'] = 'Veuillez entrer un status valide.';
        // Si le status est correct
    } else {
        $status = $_POST['status'];
    }
    if (empty($formError)) {
        $id = (int) $_POST['id'];
        if ($user->updateUser($id)) {
            header('Location: ?page=Espace-administrateur');
            exit();
        } else {
            $errorRegister = 'L\'enregistrement à échoué';
        }
    }
}
require_once 'views/updateUserForm.php';
?>