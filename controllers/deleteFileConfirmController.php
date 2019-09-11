<?php
session_start();

require_once 'models/Gallery.php';
$file = new Gallery();
$file->setId($_GET['id']);


if(!empty($_GET['delete'])){

    $id = $_GET['delete'];
//    array_map('unlink', glob('assets/uploadFile/file' . $_GET['id'] . '.*'));
    $file->deleteFile($id);
    header('Location: ?page=Liste-d\'images');
    exit();
}

if(isset($_SESSION['id'])){

    $file->setId($_SESSION['id']);
    $file->getFileById();
}
