<?php

include_once 'config.php';

class Status {
    private $idStatus;
    private $name;
    private $db;
   
    public function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public function getIdStatus() {
        return $this->idStatus;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setIdStatus($idStatus) {
        $this->id = (int) $idStatus;
    }
    
    public function getAllStatus() {
        $sql = 'SELECT `idStatus`, `name` FROM `status`';
        $statusRequest = $this->db->query($sql);
        $statusList = $statusRequest->fetchAll(PDO::FETCH_OBJ);
        return $statusList;
    }
    
}
