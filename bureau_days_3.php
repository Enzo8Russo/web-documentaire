<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bureau</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  <img class="background_1" src="img/fond.jpg">
  <img class="background_2" src="img/sheriff.png">

<div class="folder-container">
    <div id="item1" class="folder-item" onclick="openFolderWindow('Victime', 'modal-Victime')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="img/dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Victime</span>
    </div>

    <div id="item2" class="folder-item" onclick="openFolderWindow('Temoignage', 'modal-Temoignage')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="img/dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Témoignage</span>
    </div>

    <div id="item6" class="folder-item" onclick="openFolderWindow('VSuspects', 'modal-vtheories')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="img/dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Vidéos</span>
    </div>

    <!--<div class="folder-item" onclick="openFolderWindow('Aladdin', 'modal-Aladdin')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="img/dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Aladdin</span>
    </div>-->
</div>

<div class="folder-container">
  <div id="item3" class="folder-item" onclick="openFolderWindow('tache', 'modal-tache')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image_" src="img/bloc_notes_1.png" alt="Dossier fermé">
        <span class="folder-span">Tâches</span>
    </div>


    <div id="item4" class="folder-item" onclick="openFolderWindow('Suspects', 'modal-theories')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="img/dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Suspects</span>
    </div>

</div>

<div class="folder-container">
    <div id="item5" class="folder-item" onclick="openFolderWindow('Corbeille', 'modal-Corbeille')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image_" src="img/corbeille_vraiment.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Corbeille</span>
    </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-header" onmousedown="startDrag(event)">
    <span class="close-btn" style="color: #000 !important;" onclick="closeFolderWindow()">X</span>
  </div>
  <div id="modalContent"></div>
</div>

<script>
  function changeImage(element) {
    var image = element.querySelector('.folder-image');
    image.src = 'img/dossier_ouvert-01.png';
  }

  function resetImage(element) {
    var image = element.querySelector('.folder-image');
    image.src = 'img/dossier_1.png';
  }
</script>

<script>
    // Fonction pour vérifier si toutes les cases à cocher sont cochées
    function verifierCasesCochees() {
        var dossierVictime = document.getElementById('dossierVictime').checked;
        var dossierTemoignages = document.getElementById('dossierTemoignages').checked;
        
        if (dossierVictime && dossierTemoignages) {
            // Si toutes les cases sont cochées, débloquer le code
            document.getElementById('codeDebloque').style.display = 'inline';

            // Jouer le son
            var audio = new Audio('music/message.mp3');
            audio.play();
        } else {
            // Sinon, masquer le code débloqué
            document.getElementById('codeDebloque').style.display = 'none';
        }
    }
</script>


<div style="position: fixed; bottom: 0; background: #CAC6CB; width: 100%; height: 50px; border-top: 3px solid #EFEEEF;">
  <a href="fin_4.php" target="_BLANK" style="text-decoration: none;cursor: pointer;">
    <img src="img/porte_fermee_1.png" id="fezibezhbfez" class="bureau_sortit" style="padding: 6px;margin-left: 10px;" onmouseover="changeImage_1(this)" onmouseout="resetImage_1(this)">
  </a>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var items = ["item1", "item2", "item3", "item4", "item5", "item6", "codeDebloque"];
        var doorLink = document.querySelector('a[target="_BLANK"]');
        var doorClicked = false;

        // Fonction pour vérifier si tous les éléments autorisés ont été cliqués
        function checkAllItemsClicked() {
            for (var i = 0; i < items.length; i++) {
                if (!document.getElementById(items[i]).classList.contains('clicked')) {
                    return false;
                }
            }
            return true;
        }

        // Ajouter un écouteur d'événements à chaque div avec un ID autorisé
        items.forEach(function(itemId) {
            var itemDiv = document.getElementById(itemId);
            itemDiv.addEventListener('click', function(event) {
                if (!doorClicked) {
                    itemDiv.classList.add('clicked');
                    console.log("ID de l'élément cliqué : " + itemId);
                    if (checkAllItemsClicked()) {
    doorClicked = true;
    console.log("Tous les éléments ont été cliqués, la porte est débloquée !");
    var doorImage = document.getElementById("fezibezhbfez");
    doorImage.classList.add('door-open'); // Ajoute la classe pour déclencher l'animation à l'image
} else {
    console.log("Il reste des éléments à cliquer.");
}
                }
            });
        });

        // Ajouter un écouteur d'événements pour le lien de la porte de sortie
        doorLink.addEventListener('click', function(event) {
            event.preventDefault();
            if (doorClicked) {
                window.location.href = doorLink.getAttribute('href');
            } else {
                console.log("Vous devez d'abord cliquer sur tous les éléments autorisés pour ouvrir la porte !");
            }
        });
    });
</script>

<style>
/* Animation pour la porte lorsqu'elle est ouverte */
.door-open {
    animation: zoomInOut 0.5s ease-in-out infinite; /* Animation jouée en boucle indéfiniment */
}

/* Animation pour zoomer et dézoomer */
@keyframes zoomInOut {
    0% {
        transform: scale(1);
        opacity: 1; /* Opacité initiale */
    }
    50% {
        transform: scale(1.1); /* Zoom */
    }
    100% {
        transform: scale(1);
        opacity: 1; /* Retour à l'opacité normale */
    }
}


</style>



  <!-- Le code débloqué -->
<!--<div id="codeDebloque" style="display: none;">
    <a href="chat.html" target="_BLANK" style="text-decoration: none;">
        <img src="img/chat.png" style="padding: 6px;margin-left: 10px;">
        <span style="position: absolute;
        background: red;
        padding: 2px 5px;
        border-radius: 50%;
        font-size: 10px;
        color: #fff;
        font-weight: 600;
        left: 92px;    bottom: 28px;">1</span>
    </a>
</div>-->

<div id="codeDebloque" style="display: none;">
    <div onclick="openFolderWindow('porte', 'modal-porte')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div class="krjfbezhiufb">
          <img style="position: absolute;
        left: 71px;
    bottom: 10px;" src="img/chat.png" style="padding: 6px;margin-left: 10px;">
        <span style="position: absolute;
        background: red;
        padding: 2px 5px;
        border-radius: 50%;
        font-size: 10px;
        color: #fff;
        font-weight: 600;
        left: 92px;    bottom: 28px;">1</span>
        </div>
    </div>
</div>

  <span id="heure" style="    position: absolute;
    right: 29px;
    bottom: 22px;"></span>
    <span style="    position: absolute;
    right: 15px;
    bottom: 6px; font-size: 13px;">14/06/2007</span>
</div>

<script>
  function changeImage_1(element) {
    element.src = 'img/porte_ouverte_2.png';
  }

  function resetImage_1(element) {
    element.src = 'img/porte_fermee_1.png';
  }

  function mettreAJourHeure() {
    var maintenant = new Date();
    var heures = maintenant.getHours();
    var minutes = maintenant.getMinutes();
    minutes = minutes < 10 ? '0' + minutes : minutes;
    document.getElementById('heure').textContent = heures + ':' + minutes;
  }

  mettreAJourHeure();

  setInterval(mettreAJourHeure, 60000);
</script>

<script>
  $(document).ready(function () {
  $("#myModal").draggable();
});



  function openFolderWindow(folderName, modalClass) {

  var modal = $('<div>').addClass('modal ' + modalClass);
  var modalContent = $('<div>').addClass('modal-content');


  var closeButton = $('<span>').addClass('close-btn').css('color', '#fff').text('X').on('click', function() {
    closeFolderWindow(modal);
  });
  var header = $('<div>').addClass('modal-header').append(closeButton);
  modalContent.append(header);

  var folderContent = getContentForFolder(folderName);
  var resizableContainer = $('<div>').addClass('resizable-container').append(folderContent);
  modalContent.append(resizableContainer);

  modal.append(modalContent);

  $('body').append(modal);

  modal.css('display', 'block').draggable();

  resizableContainer.resizable({
    handles: "n, e, s, w, ne, se, sw, nw",
    minWidth: 200,
    minHeight: 150,
  });

  modal.css('cursor', 'move');
}





function getContentForFolder(folderName) {

  switch (folderName) {
    case 'Victime':
      return '<h2 style="color: #000;">La Victime :</h2><div class="container_modal_01"><div class="content_modal_01"><a href="img/victime_1.jpg" target="_BLANK"><img class="img_04" src="img/victime_1.jpg"></a><p style="color: #000;">Scene de crime</p></div><div class="content_modal_01"><a href="img/victime_01.jpg" target="_BLANK"><img class="img_04" src="img/victime_01.jpg"></a><p style="color: #000;">Identification de victime</p></div></div>';
    case 'Temoignage':
      return '<h2 style="color: #000;">Liste Des Témoignages :</h2><div class="container_modal_01"><div class="content_modal_01"><a href="img/temoignage_01.jpg" target="_BLANK"><img class="img_04" src="img/temoignage_01.jpg"></a><p style="color: #000;">Témoignage anonyme 1</p></div><div class="content_modal_01"><a href="img/temoignage_02.jpg" target="_BLANK"><img class="img_04" src="img/temoignage_02.jpg"><p style="color: #000;"></a>Témoignage anonyme 2</p></div></div>';
    
    case 'tache':
      return '<div style="padding: 100px;"><h2 style="color: #000;">Tâches :</h2><br><p style="color: #000;"><input type="checkbox" id="dossierVictime" onchange="verifierCasesCochees()"> Consulter le dossier des Vidéos<br><br><input type="checkbox" id="dossierTemoignages" onchange="verifierCasesCochees()"> Consulter la corbeille<br></p></div>';

      case 'Suspects':
      return '<h2 style="color: #000;">Liste Des Suspects :</h2><div class="container_modal_01"><div class="content_modal_01"><a href="img/suspect_01.jpg" target="_BLANK"><img class="img_04" src="img/suspect_01.jpg"></a><p style="color: #000;">Suspect 1</p></div><div class="content_modal_01"><a href="img/suspect_02.jpg" target="_BLANK"><img class="img_04" src="img/suspect_02.jpg"><p style="color: #000;"></a>Suspect 2</p></div><div class="content_modal_01"><a href="img/suspect_03.jpg" target="_BLANK"><img class="img_04" src="img/suspect_03.jpg"><p style="color: #000;"></a>Suspect 3</p></div></div>';

      case 'VSuspects':
      return '<h2 style="color: #000;">Vidéos Des Suspects :</h2><div class="container_modal_01"><div class="content_modal_01"><a href="img/suspect_01.jpg" target="_BLANK"><iframe src="https://cdn.jwplayer.com/players/CZjJ5kPM-iLNG6GXj.html" width="320" height="180" frameborder="0" scrolling="auto" title="Suspect 1" allowfullscreen></iframe></a><p style="color: #000;">Suspect 1</p></div><div class="content_modal_01"><a href="img/suspect_02.jpg" target="_BLANK"><iframe src="https://cdn.jwplayer.com/players/cVY1ydBQ-iLNG6GXj.html" width="320" height="180" frameborder="0" scrolling="auto" title="Suspect 2" allowfullscreen></iframe><p style="color: #000;"></a>Suspect 2</p></div><div class="content_modal_01"><a href="img/suspect_03.jpg" target="_BLANK"><iframe src="https://cdn.jwplayer.com/players/LBuwvm6M-iLNG6GXj.html" width="320" height="180" frameborder="0" scrolling="auto" title="Suspect 3" allowfullscreen></iframe><p style="color: #000;"></a>Suspect 3</p></div></div>';

    case 'porte':
       return '<link rel="stylesheet" href="styles_chat.css"><style type="text/css">#countdown {display: flex;align-items: center;justify-content: center;}</style><h1>MyChat</h1><div class="chat-container"><h3>Lucas</h3><div class="chat-box" id="chat-box"></div><input type="text" id="user-input" placeholder="Type your message..."></div><script src="script3.js"><//script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><//script>';

       case 'Corbeille':
      return '<h2 style="color: #000;">Corbeille :</h2><div class="container_modal_02" style="display: block !important;"><div style="padding: 10px;padding-bottom: 30px;"><a style="margin-right: 30px;" class="ezbfe" href="fin_2.php">Vider la Corbeille</a><a class="ezbfe" href="fin_1.php">Récupérer les fichiers</a></div><div class="content_modal_02"><a href="img/partage.jpg" class="link_04" target="_BLANK"><img class="img_03" src="img/txt.png"><p style="color: #000;">partagé.txt</p></a></div><div class="content_modal_02"><a href="img/fichier_a_supprimer.jpg" class="link_04" target="_BLANK"><img class="img_03" src="img/txt.png"><p style="color: #000;">Fichier_de_témoignage.pdf</p></a></div><div class="content_modal_02"><a href="img/rapport_medical.jpg" class="link_04" target="_BLANK"><img class="img_03" src="img/txt.png"><p style="color: #000;">Fiche_medical.pdf</p></a></div></div>';

    default:
      return '<p style="color: #000;">Contenue par défault...</p>';
  }
}


  function closeFolderWindow(modal) {
  $(modal).remove();
}



</script>

<audio id="audioPlayer" autoplay loop>
        <source src="music/Shadows_in_the_Night_1.mp3" type="audio/mpeg">
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