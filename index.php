    <?php
    define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Mythic</title>
</head>
<body>
    <h1 class="titreAccueil">Mythic</a></h1>
    <a href="./views/inscription.php">S'inscrire</a>
    <a href="./views/connexion.php">Se Connecter</a>
</body>
</html>
<script>
$(document).ready(function() {
  var bgArray = ['manhattan.jpg', 'happened.png', 'matrix.jpeg', 'eternal.jpg', 'grease.jpg', 'westside.jpg', 'lalaland.jpg'];
  var bg = bgArray[Math.floor(Math.random() * bgArray.length)];
  var path = 'ressources/';
  var imageUrl = path + bg;
  $('body').css('background-image', 'url(' + imageUrl +')');
});
</script>