<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profil de l'utilisateur</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: '../controllers/bdd.php',
                    data: formData,
                    success: function(data) {
                        alert('Mise à jour effectuée avec succès');
                    },
                    error: function() {
                        alert('Erreur lors de la mise à jour');
                    }
                });
            });
        });
    </script>
    <?php
    session_start();
    ?>
    <h1 class="titreAccueil">Profil de l'utilisateur</h1>
    <form method="post" id="formProfile">
        <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
        <p>
            <input type="email" name="mail" id="mail" value="<?= $_SESSION['user']['mail'] ?>">
        </p>
        <p>
            <input type="password" name="password" id="password" value="<?= $_SESSION['user']['password'] ?>">
        </p>
        <p>
            <input type="text" name="genre" id="genre" value="<?= $_SESSION['user']['genre'] ?>">
        </p>
        <p>
            <input type="submit" value="Mettre à jour" name="update">
        </p>
    </form>
    <select id="menu">
    <option value="compte.php?id=<?php echo $_SESSION['user']['id']; ?>">Accueil</option>
    <option selected="selected" value="profil.php?id=<?php echo $_SESSION['user']['id']; ?>">Profil</option>
    <option value="recherche.php">Recherche</option>
    <option value="connexion.php">Déconnexion</option>
</select>

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