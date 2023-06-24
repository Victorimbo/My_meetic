<?php

class MyDatabase {
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
  
    public function doUserExists($mail)
    {
        $verif = $this->db->prepare("SELECT * FROM users WHERE mail=?");
        $verif->execute([$mail]);
        $user = $verif->fetch();
        return (bool)$user;
    }

    public function addUser($id, $mail, $password, $genre, $firstname, $lastname, $birthdate, $city, $director) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`id`, `mail`, `password`, `genre`) VALUES (:id, :mail, :password, :genre);";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $query->bindValue(':genre', $genre, PDO::PARAM_STR);
        $query->execute();
        
        $sql = "INSERT INTO `profile` (`id`, `firstname`, `lastname`, `birthdate`, `city`, `director`) VALUES (:id, :firstname, :lastname, :birthdate, :city, :director);";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':director', $director, PDO::PARAM_STR);
        $query->execute();
            
        echo "L'utilisateur a été ajouté avec succès.";
    }
}