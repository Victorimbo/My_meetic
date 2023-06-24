<?php

require_once '../models/add_user.php';
require_once '../models/check_user.php';
require_once '../models/rud_user.php';
require_once '../models/search.php';

class UserController {
    private $database;
    private $rudUser;
    private $model;
     private $userModel;

    public function __construct() {
        $this->database = new MyDatabase();
        $this->rudUser = new RudUser();
        $this->model = new UserSearch();
        $this->userModel = new UserModel();
    }

    public function addUser() {
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $genre = $_POST['genre'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];
        $city = $_POST['city'];
        $director = $_POST['director'];
        
        if ($this->database->doUserExists($mail)) {
            echo "L'utilisateur existe déjà.";
            return;
        }

        if (!isset($mail) || empty($mail) || !isset($password) || empty($password) || !isset($genre) || empty($genre)) {
            echo "Tous les champs sont requis.";
            return;
        }

        $mail = strip_tags($mail);
        $password = strip_tags($password);
        $id = strip_tags($id);
        $genre = strip_tags($genre);
        
        $this->database->addUser($id, $mail, $password, $genre, $firstname, $lastname, $birthdate, $city, $director);
    }

    public function login($email, $password) {
        $user = $this->userModel->getUserByEmailPassword($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['profile'] = $firstname;
            header('Location: ../views/compte.php?id=' . $user['id']);
            return true;
        } else {
            return false;
        }
    }
    

    public function getId() {
        $this->rudUser->GetId();
    }
    
    public function updateUser() {
        $userInfo = new RudUser();
        $info = $userInfo->UpdateUSer($id, $email, $password, $genre);
    }

    public function searchUsers($search) {
        $results = $this->model->searchUsers($search);
        $this->displaySearchResults($results);
    }

    public function displaySearchResults($results) {
        if (count($results) > 0) {
            foreach ($results as $result) {
                echo "Firstname : " . $result['firstname'] . " City : " . $result['city'] . " Director : " . $result['director'] . "<br>";
            }
        } else {
            echo "Aucun résultat trouvé.";
        }
    }   
}
if (isset($_POST['update'])) {
    session_start();
    $id = $_POST['id'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $genre = $_POST['genre'];

    $info = new UserController();
    $info->updateUser($id, $email, $password, $genre);
}

if (isset($_POST['mail']) && !isset($_POST['update'])) {
    $controller = new UserController();
    $controller->addUser();
}

if (isset($_POST['submit-connexion'])) {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $user = new UserController();
    $user->login($email, $password);
}

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $userSearch = new UserSearch();
    $results = $userSearch->searchUsers($search);
    foreach($results as $result) {
        echo '<div class="carousel-item">';
        echo '<p>' . $result['firstname'] . '</p>';
        echo '<p>' . $result['city'] . '</p>';
        echo '<p>' . $result['director'] . '</p>';
        echo '</div>';
    }
}
