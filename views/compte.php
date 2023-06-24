<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Compte</title>
</head>
<body>
    <?php session_start(); ?>
    <div class="barre">
        <select id="menu">
            <option value="compte.php?id=<?php echo $_SESSION['user']['id']; ?>">Accueil</option>
            <option value="profil.php?id=<?php echo $_SESSION['user']['id']; ?>">Profil</option>
            <option value="recherche.php">Recherche</option>
            <option value="connexion.php">Déconnexion</option>
        </select>
    </div>
    <div class="bienvenue">
    <?php echo "Bienvenue" . $_GET['firstname']; ?>
    </div>
<script>
$(document).ready(function(){
    $("#menu").change(function(){
        var selectedOption = $(this).val();
        if(selectedOption != '') {
            window.location = selectedOption;
        }
    });
});
</script>
<script>
$(document).ready(function() {
  var bgArray = ['manhattan.jpg', 'happened.png', 'matrix.jpeg', 'eternal.jpg', 'grease.jpg', 'westside.jpg', 'lalaland.jpg'];
  var bg = bgArray[Math.floor(Math.random() * bgArray.length)];
  var path = '../ressources/';
  var imageUrl = path + bg;
  $('body').css('background-image', 'url(' + imageUrl +')');
});
</script>
</body>
</html>