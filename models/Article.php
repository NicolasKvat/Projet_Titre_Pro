<?php

include_once 'config.php';

class Article {

    private $id;
    private $title;
    private $text;
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

    public function getText() {
        return $this->text;
    }

    public function getPicture() {
        return $this->picture;
    }
    
        public function getIdUser() {
        return $this->idUser;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function getAllArticles() {
        $sql = 'SELECT `id`, `title`, `text`, `picture`, `idUser` FROM `Article` ORDER BY `id`;';
        $articlesRequest = $this->db->query($sql);
        $articlesList = $articlesRequest->fetchAll(PDO::FETCH_OBJ);
        return $articlesList;
    }

    public function createArticle($title, $text, $picture, $idUser) {
        $query = $this->db->prepare('INSERT INTO `Article` (title, text, picture, idUser) VALUE (:title, :text, :picture, :idUser)');
        // Lier les variables à l'instruction 'prepare' en tant que valeurs
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':text', $text, PDO::PARAM_STR);
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

    //methode qui met à jour l'article
    public function updateArticle($title, $text, $picture, $idUser) {
        //preparation de la requete
        $query = $this->db->prepare("UPDATE `Article` SET title = :title, text = :text, picture = :picture, idUser = :idUser WHERE id = :id;");
        $query->bindValue(':title', $_POST['title']);
        $query->bindValue(':text', $_POST['text']);
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

    //fonction supprimer l'article
    public function deleteArticle($id) {
        // Stockage de la requête SQL
        $query = $this->db->prepare('DELETE FROM `Article` WHERE `id` = :id');
        // Association d'une valeur au paramètre
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        // Exécution de la requête SQL
        $query->execute();
    }

    public function verifyArticle() {
        $query = $this->db->prepare('SELECT * FROM `Article` WHERE `id` = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($query->execute()) {
            if ($query->columnCount() > 0) {
                return true;
            }
        }
        return false;
    }

    public function getArticleById() {
        $query = $this->db->prepare('SELECT * FROM `Article` WHERE `id` = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($query->execute()) {
            $article = $query->fetch(PDO::FETCH_OBJ);
            $this->title = $article->title;
            $this->text = $article->text;
            $this->picture = $article->picture;
            $this->idUser = $article->idUser;
            return true;
        }
        return false;
    }

}
