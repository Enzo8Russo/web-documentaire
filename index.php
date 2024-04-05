<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Documentaire - Start</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<img class="background_1" src="img/background.jpg">
<div style="display: flex; align-items: end; justify-content: center;">
  <h1 style="    color: #fff;
      font-size: 130px;
      width: 80%;
      padding-top: 200px;
      padding-left: 75px;">LE SHERIFF JOHN</h1>

  <a href="days_1.php">
    <img class="start_img" src="img/start.png">
  </a>
</div>
<p style="color: #fff; font-size: 16px; margin-left: 50px; padding: 30px; font-weight: 600;max-width: 800px;  width: 100%;">Un meurtre a été commis dans la ville de Blaine County. Un des médecins traitant de l'hôpital de la ville vient d’être assassiné dans son domicile dans la nuit du 14 au 16 juin 2007. Le corps poignardé a été découvert ce matin par les autorités suite à un appel des voisins.
Vous suivez le point de vue de John Hiddleton, l’enquêteur en charge de l’affaire. Son but est de démasquer le coupable et de comprendre les raisons derrière cet assassinat.
</p>
<p style="    text-align: end;
    color: #fff;
    font-size: 20px;
    font-weight: 600; margin-right: 20px;-webkit-text-stroke-width: 0.7px;  -webkit-text-stroke-color: black;">Célian MATS   -    Tommy HA   -    Enzo RUSSO  -    Colin BAZELAIRE   -  Louis THOMAS</p>

   <audio id="audioPlayer" autoplay loop>
        <source src="music/Shadows_in_the_Night.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>


<script>
// Fonction pour tenter de lire le son
function tenterLecture() {
    var audio = document.getElementById("audioPlayer");
    audio.play().catch(function(error) {
        console.log("La lecture automatique n'a pas été autorisée par le navigateur:", error);
    });
}

// Appel de la fonction pour tenter la lecture du son
window.onload = tenterLecture;
</script>

</body>
</html>