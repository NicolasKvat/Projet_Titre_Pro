<?php

include_once 'config.php';

class User {

    private $id;
    private $lastName;
    private $firstName;
    private $email;
    private $passWord;
    private $idStatus;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    // fonctions permettant d'afficher les infos de l'utilisateur
    public function getId() {
        return $this->id;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->passWord;
    }

    public function getIdStatus() {
        return $this->idStatus;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function getAllUsers() {
        $sql = 'SELECT `id`, `lastName`, `firstName`, `email`, `passWord`, `status`.`name` AS status FROM `User` INNER JOIN `status` USING (idStatus) ORDER BY `id`;';
        $usersRequest = $this->db->query($sql);
        $userList = $usersRequest->fetchAll(PDO::FETCH_OBJ);
        return $userList;
    }

    public function createUser($lastName, $firstName, $email, $passWord, $idStatus) {
        // On vérifie si le mail existe
        $sql = 'SELECT * FROM `User` WHERE `email` = ?';
        $query = $this->db->prepare($sql);
        $query->execute(array($email));
        $mailExists = $query->rowCount();
        // Si le mail n'existe pas, on peut insérer les données dans la BDD.
        if ($mailExists == 0) {
            $sql = 'INSERT INTO `User` (lastName, firstName, email, passWord, idStatus) VALUE (:lastName, :firstName, :email, :passWord, :status)';
            if ($query = $this->db->prepare($sql)) {
                // Lier les variables à l'instruction 'prepare' en tant que valeurs
                $query->bindValue(':lastName', $lastName, PDO::PARAM_STR);
                $query->bindValue(':firstName', $firstName, PDO::PARAM_STR);
                $query->bindValue(':email', $email, PDO::PARAM_STR);
                $query->bindValue(':passWord', $passWord, PDO::PARAM_STR);
                $query->bindValue(':status', $idStatus, PDO::PARAM_STR);
                // Si l'instruction 'execute' ne rencontre pas de difficultés.
                $query->execute();
                header('Location:?page=Espace-administrateur');
                return true;             
            }
        } else {
            echo '<p class="idError text-danger font-weight-bold">'.'Cette adresse mail est déjà utilisée !'.'</p>';
            return false;
        }
    }
    
        public function registerUser($lastName, $firstName, $email, $passWord, $idStatus) {
        // On vérifie si le mail existe
        $sql = 'SELECT * FROM `User` WHERE `email` = ?';
        $query = $this->db->prepare($sql);
        $query->execute(array($email));
        $mailExists = $query->rowCount();
        // Si le mail n'existe pas, on peut insérer les données dans la BDD.
        if ($mailExists == 0) {
            $sql = 'INSERT INTO `User` (lastName, firstName, email, passWord, idStatus) VALUE (:lastName, :firstName, :email, :passWord, :status)';
            if ($query = $this->db->prepare($sql)) {
                // Lier les variables à l'instruction 'prepare' en tant que valeurs
                $query->bindValue(':lastName', $lastName, PDO::PARAM_STR);
                $query->bindValue(':firstName', $firstName, PDO::PARAM_STR);
                $query->bindValue(':email', $email, PDO::PARAM_STR);
                $query->bindValue(':passWord', $passWord, PDO::PARAM_STR);
                $query->bindValue(':status', $idStatus, PDO::PARAM_STR);
                // Si l'instruction 'execute' ne rencontre pas de difficultés.
                $query->execute();
                header('Location:?page=Inscription-validé');
                return true;             
            }
        } else {
            echo '<p class="idError text-danger font-weight-bold">'.'Cette adresse mail est déjà utilisée !'.'</p>';
            return false;
        }
    }

    //méthode qui met à jour l'utilisateur
    public function updateUser($id) {
        //preparation de la requete
        $query = $this->db->prepare("UPDATE `User` SET lastName = :lastName, firstName = :firstName, email = :email, idStatus = :idStatus WHERE id = :id;");
        $query->bindValue(':lastName', $_POST['lastName']);
        $query->bindValue(':firstName', $_POST['firstName']);
        $query->bindValue(':email', $_POST['email']);
        $query->bindValue(':idStatus', $_POST['status']);
        $query->bindValue(':id', $id);
        //execution de la requete
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

    //fonction supprimer l'utilisateur
    public function deleteUser($id) {
        // Stockage de la requête SQL
        $query = $this->db->prepare('DELETE FROM `User` WHERE `id` = :id');
        // Association d'une valeur au paramètre
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        // Exécution de la requête SQL
        $query->execute();
    }

    public function verifyUser() {
        $query = $this->db->prepare('SELECT * FROM `User` WHERE `id` = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($query->execute()) {
            if ($query->columnCount() > 0) {
                return true;
            }
        }
        return false;
    }

    public function connectUser($email, $passWord) {
        global $error;
        $query = $this->db->prepare('SELECT * FROM `User` WHERE `email` = :email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);
        if (empty($user)) {
            $error = 'Veuillez insérer un mail et un mot de passe valide !!!';
            return false;
        } else {
            if (password_verify($passWord, $user->passWord)) {
                $_SESSION['id'] = $user->id;
                $_SESSION['lastName'] = $user->lastName;
                $_SESSION['firstName'] = $user->firstName;
                $_SESSION['email'] = $user->email;
                $_SESSION['idStatus'] = $user->idStatus;
                return true;
            } else {
                $error = 'Veuillez insérer un mail et un mot de passe valide !!!';
                return false;
            }
        }
    }

    public function getUserById() {
        $query = $this->db->prepare('SELECT * FROM `User` WHERE `id` = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($query->execute()) {
            $user = $query->fetch(PDO::FETCH_OBJ);
            $this->lastName = $user->lastName;
            $this->firstName = $user->firstName;
            $this->email = $user->email;
            $this->passWord = $user->passWord;
            $this->idStatus = $user->idStatus;
            return true;
        }
        return false;
    }

}
