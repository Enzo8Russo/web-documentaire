<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bureau</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>

  <img class="background_1" src="../fond.jpg">
  <img class="background_2" src="../sheriff.png">

<div class="folder-container">
    <div class="folder-item" onclick="openFolderWindow('Victime', 'modal-Victime')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Victime</span>
    </div>

    <div class="folder-item" onclick="openFolderWindow('Temoignage', 'modal-Temoignage')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Témoignage</span>
    </div>

    <!--<div class="folder-item" onclick="openFolderWindow('Aladdin', 'modal-Aladdin')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Aladdin</span>
    </div>-->
</div>

<div class="folder-container">
	<div class="folder-item" onclick="openFolderWindow('tache', 'modal-tache')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image_" src="../bloc_notes_1.png" alt="Dossier fermé">
        <span class="folder-span">Tâches</span>
    </div>


    <!--<div class="folder-item" onclick="openFolderWindow('Théories', 'modal-theories')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Théories</span>
    </div>-->

</div>

<div class="folder-container">
    <div class="folder-item" onclick="openFolderWindow('Corbeille', 'modal-Corbeille')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image_" src="../corbeille.png" alt="Dossier fermé">
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
    image.src = '../dossier_ouvert-01.png';
  }

  function resetImage(element) {
    var image = element.querySelector('.folder-image');
    image.src = '../dossier_1.png';
  }
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
      return '<h2 style="color: #000;">La Victime :</h2><div style="padding: 50px; display: flex;align-items: center; justify-content: center;"><div style="text-align: center;"><img style="width: 30%; margin-bottom: 20px;" src="../victime_1.jpg"><p style="color: #000;">Scene de crime<br><br><a href="../victime_1.jpg" target="_BLANK">En Savoir Plus</a></p></div><div style="text-align: center;"><img style="width: 30%; margin-bottom: 20px;" src="../victime_01.jpg"><p style="color: #000;">Identification de victime<br><br><a href="../victime_01.jpg" target="_BLANK">En Savoir Plus</a></p></div></div>';
    case 'Temoignage':
      return '<h2 style="color: #000;">Liste Des Témoignages :</h2><div style="padding: 50px; display: flex;align-items: center; justify-content: center;"><div style="text-align: center;"><img style="width: 30%; margin-bottom: 20px;" src="../temoignage_01.jpg"><p style="color: #000;">Témoignage anonyme 1<br><br><a href="../temoignage_01.jpg" target="_BLANK">En Savoir Plus</a></p></div><div style="text-align: center;"><img style="width: 30%; margin-bottom: 20px;" src="../temoignage_02.jpg"><p style="color: #000;">Témoignage anonyme 2<br><br><a href="../temoignage_02.jpg" target="_BLANK">En Savoir Plus</a></p></div></div>';
    
    case 'tache':
      return '<div style="padding: 100px;"><h2 style="color: #000;">Tâches :</h2><br><p style="color: #000;"><input type="checkbox" id="dossierVictime" onchange="verifierCasesCochees()"> Consulter le dossier de la victime<br><br><input type="checkbox" id="dossierTemoignages" onchange="verifierCasesCochees()"> Consulter le dossier des témoignages<br></p></div>';
    
    case 'Corbeille':
      return '<div style="padding: 100px;"><h2 style="color: #000;">Corbeille</h2><br><p style="color: #000;">La Corbeille est vide !</p></div>';
    default:
      return '<p style="color: #000;">Contenue par défault...</p>';
  }
}


  function closeFolderWindow(modal) {
  $(modal).remove();
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
        } else {
            // Sinon, masquer le code débloqué
            document.getElementById('codeDebloque').style.display = 'none';
        }
    }
</script>


<div style="position: fixed; bottom: 0; background: #CAC6CB; width: 100%; height: 50px; border-top: 3px solid #EFEEEF;">
  <a href="#" style="text-decoration: none;">
    <img src="../porte_fermee_1.png" class="bureau_sortit" style="padding: 6px;margin-left: 10px;" onmouseover="changeImage_1(this)" onmouseout="resetImage_1(this)">
  </a>
  <!-- Le code débloqué -->
<div id="codeDebloque" style="display: none;">
    <a href="../chat.html" target="_BLANK" style="text-decoration: none;">
        <img src="../chat.png" style="padding: 6px;margin-left: 10px;">
        <span style="position: absolute;
        background: red;
        padding: 2px 5px;
        border-radius: 50%;
        font-size: 10px;
        color: #fff;
        font-weight: 600;
        left: 92px;    bottom: 28px;">1</span>
    </a>
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
    element.src = '../porte_ouverte_2.png';
  }

  function resetImage_1(element) {
    element.src = '../porte_fermee_1.png';
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


</body>
</html>
