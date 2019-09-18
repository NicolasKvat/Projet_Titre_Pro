<?php
if (!isset($_SESSION['id']) || $_SESSION['idStatus'] != 2) {
    header('Location: ?page=Accueil');
    exit();
}
include_once 'models/Gallery.php';
$Gallery = new Gallery();
$fileList = $Gallery->getAllFiles();
require_once 'views/fileGalleryList.php';
