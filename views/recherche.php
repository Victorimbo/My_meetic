<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <title>Utilisateurs</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php session_start(); ?>
    
    <form method="post" action="../controllers/bdd.php">
    <label for="search">Rechercher un client</label>
    <input type="text" id="search" name="search">
    <input type="button" value="Rechercher" id="submit">
</form>
<div id="carousel-container">
    <div id="carousel-results">
        
    </div>
    <button id="prev-btn">Précédent</button>
    <button id="next-btn">Suivant</button>
</div>
<select id="menu">
    <option selected="selected" value="recherche.php">Recherche</option>
    <option value="compte.php?id=<?php echo $_SESSION['user']['id']; ?>">Accueil</option>
    <option selected="selected" value="profil.php?id=<?php echo $_SESSION['user']['id']; ?>">Profil</option>
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
$("#submit").click(function(event){
event.preventDefault();
var search = $("#search").val();
$.ajax({
type: "POST",
url: "recherche.php",
data: {search: search},
success: function(data){
$("#carousel-results").html(data);
let items = document.querySelectorAll('.carousel-item');
displayItems();
}
});
});
let currentIndex = 0;
let prevBtn = document.querySelector('#prev-btn');
let nextBtn = document.querySelector('#next-btn');

prevBtn.addEventListener('click', function () {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = items.length - 1;
    }
    displayItems();
});

nextBtn.addEventListener('click', function () {
    currentIndex++;
    if (currentIndex >= items.length) {
        currentIndex = 0;
    }
    displayItems();
});

function displayItems() {
    items.forEach(function (item, index) {
        if (index === currentIndex) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
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
