<?php

// Pattern de test :
$emailPattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?])([-+!*$@%_?\w]{8,15})$/';
//   On test chaque input en fonction de son pattern et s'il ne correspond pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
if (isset($_POST)) {
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