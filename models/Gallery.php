<?php

include_once 'config.php';

class Gallery {

    private $id;
    private $title;
    private $picture;
    private $idUser;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    //méthodes permettant d'afficher les informations
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getIdUser() {
        return $this->picture;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function getAllFiles() {
        $sql = 'SELECT `id`, `title`, `picture`, `idUser` FROM `Gallery` ORDER BY `id`;';
        $fileRequest = $this->db->query($sql);
        $fileList = $fileRequest->fetchAll(PDO::FETCH_OBJ);
        return $fileList;
    }

    public function createFile($title, $picture, $idUser) {
        $query = $this->db->prepare('INSERT INTO `Gallery` (title, picture, idUser) VALUES (:title, :picture, :idUser)');
        // Lier les variables à l'instruction 'prepare' en tant que valeurs
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':picture', $picture, PDO::PARAM_STR);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        //execution de la requete
        if ($query->execute()) {
            try {
                // On récupère l'identifiant de la dernière ligne insérée
                $lastId = $this->db->lastInsertId();
                $this->id = $lastId;
                return true;
            } catch (Exception $ex) {
                return false;
            }
        }
    }

    //fonction supprimer l'image
    public function deleteFile($id) {
        // Stockage de la requête SQL
        $query = $this->db->prepare('DELETE FROM `Gallery` WHERE `id` = :id');
        // Association d'une valeur au paramètre
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        // Exécution de la requête SQL
        $query->execute();
    }

    //methode qui met à jour l'image
    public function updateFile($title, $picture, $idUser) {
        //preparation de la requete
        $query = $this->db->prepare("UPDATE `Gallery` SET title = :title, picture = :picture, idUser = :idUser WHERE id = :id");
        $query->bindValue(':title', $_POST['title']);
        $query->bindValue(':picture', $picture);
        $query->bindValue(':idUser', $idUser);
        $query->bindValue(':id', $this->id);
        //execution de la requete
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function verifyFile() {
        $query = $this->db->prepare('SELECT * FROM `Gallery` WHERE `id` = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($query->execute()) {
            if ($query->columnCount() > 0) {
                return true;
            }
        }
        return false;
    }

    public function getFileById() {
        $query = $this->db->prepare('SELECT * FROM `Gallery` WHERE `id` = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($query->execute()) {
            $file = $query->fetch(PDO::FETCH_OBJ);
            $this->title = $file->title;
            $this->picture = $file->picture;
            $this->idUser = $file->idUser;
            return true;
        }
        return false;
    }

}
