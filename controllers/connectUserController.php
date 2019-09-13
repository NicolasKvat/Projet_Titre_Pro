<?php
// Pattern de test :
$emailPattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?])([-+!*$@%_?\w]{8,15})$/';
//   On test chaque input en fonction de son pattern et s'il ne correspond pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
    // S'il y a une session alors on ne retourne plus sur cette page  

if (isset($_POST['disconnect'])) { 
    $_SESSION = [];
    header('Refresh:0');
}
if (isset($_POST['connectionUser'])) {
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
    // Si le champs passWord est vide
    if (empty($_POST['passWord'])) {
        $formError['passWord'] = 'Veuillez entrer un mot de passe.';
        // Si le passWord est incorrect
    } elseif (!preg_match($passwordPattern, $_POST['passWord'])) {
        $formError['passWord'] = 'Veuillez entrer un mot de passe valide.';
        // Si le passWord est correct
    } else {
        $passWord = trim($_POST['passWord']);
    }
    if (empty($formError)) {
        $connectUser = 'Mon compte';
        // On inclut le fichier contenant notre objet
        require_once 'models/User.php';
        // On crée un nouvel objet User
        $user = new User();
        // On donne toutes les dépendances nécessaires à la vérifications de l'existence de l'utilisateur.
        $user->connectUser($email, $passWord);
    }
} else {
    $connectUser = 'Connexion';
}
?>



