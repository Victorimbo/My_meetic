<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<h1 class="titreAccueil">Mythic</h1>
    <form id="registrationForm">
        <p>
            <input type="text" name="firstname" placeholder="Prénom">
        </p>
        <p>
            <input type="text" name="lastname" placeholder="Nom">
        </p>
        <p>
        <input type="email" name="mail" placeholder="Email">
        </p>
        <p>
        <input type="password" name="password" placeholder="Mot de passe">
        </p>
        <p>
        <input type="text" name="genre" placeholder="Genre">
        </p>
        <p>
        <input type="text" name="city" placeholder="Ville">
        </p>
        <p>
        <input type="date" name="birthdate" placeholder="Anniversaire">
        </p>
        <p>
        <input type="text" name="director" placeholder="Réalisateur préféré">
        </p>
        <p>
        <input type="submit" value="Submit">
        </p>
    </form>
    <div id="message"></div>
    <script>
        $("#registrationForm").submit(function(e) {
            e.preventDefault();
            var birthdate = new Date($("input[name='birthdate']").val());
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            var m = today.getMonth() - birthdate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
                age--;
            }
            if (age < 18) {
                alert("Vous devez avoir au moins 18 ans pour vous inscrire.");
                return;
            }
            $.ajax({
                type: "post",
                url: "../controllers/bdd.php",
                data: $("#registrationForm").serialize(),
                success: function(data) {
                    $("#message").html("Inscription effectuée avec succès. <a href='connexion.php'>Se connecter</a>");
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