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
    <div class="folder-item" onclick="openFolderWindow('Fondateur', 'modal-fondateur')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Fondateur</span>
    </div>

    <div class="folder-item" onclick="openFolderWindow('Investissements', 'modal-investissements')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Investissements</span>
    </div>

    <div class="folder-item" onclick="openFolderWindow('Aladdin', 'modal-Aladdin')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Aladdin</span>
    </div>
</div>

<div class="folder-container">
	<div class="folder-item" onclick="openFolderWindow('Critiques', 'modal-critiques')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Critiques</span>
    </div>


    <div class="folder-item" onclick="openFolderWindow('Théories', 'modal-theories')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        <span class="folder-span">Théories</span>
    </div>

</div>

<div class="folder-container">
    <div class="folder-item" onclick="openFolderWindow('Confidentiels', 'modal-confidentiels')" onmouseover="changeImage(this)" onmouseout="resetImage(this)">
        <div style="width: 100%;">
            <img class="folder-image" src="../dossier_1.png" alt="Dossier fermé">
        </div>
        <span class="folder-span">Confidentiels</span>
    </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-header" onmousedown="startDrag(event)">
    <span class="close-btn" style="color: #fff;" onclick="closeFolderWindow()">X</span>
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
  // Crée la fenêtre modale avec jQuery
  var modal = $('<div>').addClass('modal ' + modalClass);
  var modalContent = $('<div>').addClass('modal-content');

  // Ajoute la croix de fermeture
  var closeButton = $('<span>').addClass('close-btn').css('color', '#fff').text('X').on('click', function() {
    closeFolderWindow(modal);
  });
  var header = $('<div>').addClass('modal-header').append(closeButton);
  modalContent.append(header);

  // Ajoute le contenu spécifique du dossier dans un élément supplémentaire
  var folderContent = getContentForFolder(folderName);
  var resizableContainer = $('<div>').addClass('resizable-container').append(folderContent);
  modalContent.append(resizableContainer);

  // Ajoute le contenu à la fenêtre modale
  modal.append(modalContent);

  // Ajoute la fenêtre modale au corps du document
  $('body').append(modal);

  // Affiche la fenêtre modale et la rend draggable
  modal.css('display', 'block').draggable();

  // Rend l'élément resizable
  resizableContainer.resizable({
    handles: "n, e, s, w, ne, se, sw, nw", // Définir les poignées de redimensionnement
    minWidth: 200, // Définir la largeur minimale
    minHeight: 150, // Définir la hauteur minimale
  });

  modal.css('cursor', 'move');
}





function getContentForFolder(folderName) {
  // Ajoutez ici le contenu spécifique pour chaque dossier
  switch (folderName) {
    case 'Fondateur':
      return '<h2 style="color: #fff;">Fondateur</h2><img style="width: 35%;" src="https://images-ext-2.discordapp.net/external/UhSoG_YaCyiXfZZo8iE58WBF9bnh_JP1rNOXPWIty5M/%3Ffit%3D865%252C550%26ssl%3D1/https/i0.wp.com/worth.com/wp-content/uploads/2023/09/LarryFink-2.png?format=webp&quality=lossless"><p style="color: #fff;">Larry Fink est l’un des hommes les plus puissants du monde,<br> il dirige dans l’ombre toutes les boîtes qui font<br> votre quotidien comme Apple, Facebook, Amazon, Disney, Netflix. <br>Il possède également la plupart des banques américaines. <br>Il est le seul chef d’entreprise à avoir obtenu un siège à<br> l’Elysée. Son entreprise, BlackRock, est infiltrée de partout :<br> dans plus de 38 pays, les hautes sphères du pouvoir, les médias,<br> les banques, etc.. Larry Fink est donc capable d’influencer les <br>économies, de tous vos possessions et du monde.  Il est en relation<br> avec quasiment tous les hommes politiques au monde et possède une<br> certaine influence sur la politique de plusieurs pays. Larry Fink<br> devient indispensable au sein de la politique américaine, il est<br> appelé pour aider le pays à gérer son économie en 2008, et en 2020<br> pendant la crise du coronavirus. En France, Larry Fink est BlackRock<br> exercent également leur influence en poussant Emmanuel Macron à changer<br> son système de retraite en passant d’un système de répartition à un système<br> de capitalisation. Ce nouveau système permet à BlackRock de gagner des<br> milliards de dollars. Pour finir, Larry Fink est également membre d’un<br> certain nombre d’organisations non gouvernementales extrêmement influentes<br> comme le World Economic Forum, le Council on Foreign Relations<br> et la société secrète Kappa Beta Phi.</p><img src="https://media.discordapp.net/attachments/1035107819533385748/1187493104534683778/visite_presidentielle.jpg?ex=65971622&is=6584a122&hm=fcae663052285f503c3dcb457e98862e68db39c2565a226187f96b4e5520549f&=&format=webp">';
    case 'Investissements':
      return '<h2 style="color: #fff;">Investissements</h2><p style="color: #fff;">Grâce à plus de 3 500 fonds, BlackRock siège au sein des assemblées<br> d’actionnaires de plusieurs milliers de sociétés.<br> À ce jour, voici des exemples de ses principales participations (en<br> valeur) au sein de grandes sociétés cotées américaines :</p><img style="width: 80%;" src="https://media.discordapp.net/attachments/1035107819533385748/1187511325388193852/graphique_investissements.png?ex=6597271a&is=6584b21a&hm=0247a46345ae3a6ab28c41270c0c372101a65abca7b6b58ebdfa850edbba6c59&=&format=webp&quality=lossless&width=1246&height=676">';
    case 'Aladdin':
      return '<h2 style="color: #fff;">Aladdin</h2><p style="color: #fff;">Aladdin (Asset, Liability, Debt and Derivative Investment Network)<br> est un système électronique créé par BlackRock qui utilise l’IA pour<br> gérer environ 22 000 milliards de dollars d’actifs, surveillant en même<br> temps environ 30 000 portefeuilles d’investissement. Elle est devenue<br> indispensable pour les grosses entreprise, les banques, les gouvernements<br> et les gérants d’actifs. Voici une vidéo de Michael Ferrari expliquant la<br> dangerosité de cette IA :</p><iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/jF0vciA1Yd8?si=SpufPQ8t7qXuMKly" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    case 'Critiques':
      return '<h2 style="color: #fff;">Critiques</h2><p style="color: #fff;">-    Réformes des retraites, BlackRock est vu comme le symbole du capitalisme. <br>Des manifestation ont eu lieu au sein du siège parisien de BlackRock<br><br>-    Changement climatique, BlackRock serait l’un des plus grand <br>destructeur du climat en partie en raison de son refus de se départir<br> des sociétés du secteur des combustibles fossiles<br><br>-    BlackRock a également été critiqué pour ses investissements dans des entreprises<br> qui ont un impact négatif sur la société. Par exemple, BlackRock est un<br> important actionnaire de nombreuses entreprises qui fabriquent des armes, du<br> tabac ou des produits chimiques dangereux.</p><img src="https://media.discordapp.net/attachments/1035107819533385748/1187492757988716675/reformes.jpg?ex=659715d0&is=6584a0d0&hm=661bb605cf8a28f8831e16220c093ff7a60025829109fcf3fbd967605fd83dee&=&format=webp">';
    case 'Théories':
      return '<h2 style="color: #fff;">Théories</h2><p style="color: #fff;">Voici les théories du complot les plus connues sur la société BlackRock :<br><br>•    L’entreprise aurait créé un vaccin contre la COVID-19 uniquement pour l’argent.<br><br>•    BlackRock serait trop puissant. Il contrôle une part trop importante des marchés<br> financiers et peut donc influencer les prix des actifs.<br><br>•    BlackRock est opaque et utiliserait ses données pour contrôler l’économie mondiale.<br><br>•    À la tête des Illuminatis, la société contrôlerait le monde dans l’ombre.<br><br>•    Il serait décrit par certains comme un gouvernement fantôme qui contrôle les<br> politiques de plusieurs pays.</p><img style="width: 55%;" src="https://media.discordapp.net/attachments/1035107819533385748/1187499236640694292/logo-blackrock-illuminati.png?ex=65971bd8&is=6584a6d8&hm=749ca18bc0965cc1d42497695da1a3a62a93038974f7e3b55fac2927ae2efd67&=&format=webp&quality=lossless&width=1440&height=288">';
    case 'Confidentiels':
      return '<h2 style="color: #fff;">Confidentiels</h2><br><p style="color: #fff;">Etes-vous sur de vouloir consulter les dossiers confidentiels ?<br><br><br><br><a href="404.html" target="_BLANK" class="index_a_2" style="text-decoration: none; text-transform: uppercase;">Je veux en savoir plus !</a></p>';
    default:
      return '<p style="color: #fff;">Contenue par défault...</p>';
  }
}


  function closeFolderWindow(modal) {
  $(modal).remove(); // Supprime la fenêtre modale spécifique
}



</script>


</body>
</html>
