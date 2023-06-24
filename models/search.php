<?php

class UserSearch {

    private $db;
    
    public function __construct()
    {
        $this->connectToDB();
    }
    
    public function connectToDB()
    {
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=my_meetic', 'root','root');
            $this->db->exec('SET NAMES "UTF8"');
        } catch (PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }
    }
    
    public function searchUsers($search) {
        $query = $this->db->prepare("SELECT firstname, city, director FROM profile WHERE city LIKE :search OR director LIKE :search");
        $query->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}