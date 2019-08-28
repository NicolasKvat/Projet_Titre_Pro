<?php

// Pattern de test :
$emailPattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?])([-+!*$@%_?\w]{8,15})$/';
$stringPattern = '/^[a-zA-ZéèôöîïçÉÈÎÏ \'-]+([-\'\s][a-zA-ZéèôöîïçÉÈÎÏ \'-][a-zéèôöîïç \']+)?$/';
//   On test chaque input en fonction de son pattern et si ils ne correspondent pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
$arrayOfErrors[];
if ($_POST) {
    if (!preg_match($emailPattern, $_POST['emailRegister'])) {
        $arrayOfErrors['emailRegister'] = 'Email invalide';
        $_POST['emailRegister'] = '';
    }
    if (!preg_match($passwordPattern, $_POST['passwordRegister'])) {
        $arrayOfErrors['passwordRegister'] = 'mot de passe invalide';
        $_POST['passwordRegister'] = '';
    }
    if (!preg_match($stringPattern, $_POST['lastname'])) {
        $arrayOfErrors['lastname'] = 'Nom invalide';
        $_POST['lastname'] = '';
    }
    if (!preg_match($stringPattern, $_POST['firstname'])) {
        $arrayOfErrors['firstname'] = 'Prénom invalide';
        $_POST['firstname'] = '';
    }
}
require_once 'views/formRegister.php';