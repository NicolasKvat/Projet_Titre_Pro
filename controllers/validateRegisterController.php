<?php
if (!isset($_SESSION['id'])) {
    header('Location: ?page=Accueil');
}
require_once 'views/validateRegister.php';