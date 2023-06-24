<?php
class RudUser {
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
    
    public function getId() {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = strip_tags($_GET['id']);
            $sql = "SELECT * FROM `users` WHERE `id`=:id;";
        
            $query = $this->db->prepare($sql);
        
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
        
            $user = $query->fetch();
            return $user;
        }
    }
    
    public function updateUser() {
        if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['mail']) && !empty($_POST['mail'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['genre']) && !empty($_POST['genre'])){
            $id = strip_tags($_POST['id']);
            $mail = strip_tags($_POST['mail']);
            $password = strip_tags($_POST['password']);
            $genre = strip_tags($_POST['genre']);
            
            $sql = "UPDATE `users` SET id=:id, `mail`=:mail, `password`=:password, `genre`=:genre WHERE `id`=:id;";

            $query = $this->db->prepare($sql);

            $query->bindValue(':mail', $mail, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->bindValue(':genre', $genre, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            $query->execute();
        }
    }
}