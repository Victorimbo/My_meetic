<?php
class UserModel {
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

    public function getUserByEmailPassword($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE mail = :mail");
        $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
?>