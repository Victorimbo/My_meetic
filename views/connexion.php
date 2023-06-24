<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<h1 class="titreAccueil">Mythic</a></h1>
<!-- <a id="conectPage" href="inscription.php">Pas encore inscrit ?</a> -->
<a id="connectPage" href="../index.php">Retour à l'accueil</a>
<form action="../controllers/bdd.php" method="post" id="formConnexion">
    <p>
    <input type="email" name="mail" placeholder="Email">
    </p>
    <p>
    <input type="password" name="password" placeholder="Mot de passe">
    </p>
    <p>
    <input type="submit" name="submit-connexion" value="Submit">
    </p>
</form>
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