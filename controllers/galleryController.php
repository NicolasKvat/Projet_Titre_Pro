<?php
include_once 'models/Gallery.php';
$Gallery = new Gallery();
$fileList = $Gallery->getAllFiles();
require_once 'views/gallery.php';
