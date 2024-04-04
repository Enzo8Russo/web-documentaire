const chatBox = document.getElementById('chat-box');
const userInput = document.getElementById('user-input');

const predefinedMessages = [
  "Lucas : Salut John , alors t’es toujours sur le dossier ? Ça fait beaucoup de temps que tu es dessus.",
  "John : Oui mais ne t’inquiète pas Lucas, normalement je devrai bientôt en terminer avec ce dossier.",
  "Lucas :  Okay tu me diras quand tu aura fini , on se fera une bouffe. Je m’inquiète pour toi tu sais, tu n’aurais pas dû t’occuper du dossier seul.",
  "John : Je dois clôturer l’affaire coûte que coûte.",
  "Lucas : D’accord mais pense à ta santé d’abord.",
  "John : Ne t’en fais pas, tu as réussi à dormir cette nuit ?",
  "Lucas : J'ai eu peu de sommeil cette nuit, mais étrangement, je me sens plutôt en forme.",
  "John : Je t’apporterai des somnifères ce soir, ça pourra t’aider à mieux dormir.",
  "Lucas : Pas de problème. Passe une bonne fin de journée et ménage toi.",
  "John : Merci, toi aussi. Je ne vais pas tarder à quitter le bureau de t'inquiète pas."
];

let currentMessageIndex = 0;

function displayMessage(message) {
  const messageElement = document.createElement('div');
  messageElement.textContent = message;
  messageElement.classList.add(currentMessageIndex % 2 === 0 ? 'message-from-lucas' : 'message-from-john');
  chatBox.appendChild(messageElement);
  updateScrollbar();
}

displayMessage(predefinedMessages[currentMessageIndex]);
currentMessageIndex++;

function updateScrollbar() {
  chatBox.scrollTop = chatBox.scrollHeight;
}

userInput.addEventListener('input', function(event) {
  const inputText = event.target.value;
  if (currentMessageIndex < predefinedMessages.length) {
    userInput.value = predefinedMessages[currentMessageIndex].substring(0, inputText.length);
  }
});

// Événement pour détecter l'appui sur la touche "Enter"
userInput.addEventListener('keydown', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault(); // Empêcher le comportement par défaut du formulaire

    // Récupérer le texte prédéfini correspondant à l'index actuel
    const predefinedText = predefinedMessages[currentMessageIndex];

    // Afficher le message prédéfini dans la chat box
    displayMessage(predefinedText);
    userInput.value = ''; // Réinitialiser l'input
    currentMessageIndex++;

    // Gérer la redirection si c'est le dernier message prédéfini
    if (currentMessageIndex === predefinedMessages.length) {
      // Créer l'élément span pour le compte à rebours
      const countdownElement = document.createElement('span');
      countdownElement.id = 'countdown';
      countdownElement.style.fontSize = '18px';
      countdownElement.textContent = 'Redirection dans : ';

      // Ajouter le compte à rebours à la div container_chat
      const containerChat = document.getElementById('container_chat');
      containerChat.appendChild(countdownElement);

      let seconds = 5;

      // Créer l'intervalle pour le compte à rebours
      const countdownInterval = setInterval(function() {
        seconds--;
        countdownElement.textContent = 'Redirection dans : ' + seconds + ' secondes';

        if (seconds <= 0) {
          clearInterval(countdownInterval);
          window.location.href = 'days_2.php'; // Rediriger vers la page spécifiée
        }
      }, 1000); // Répéter toutes les 1 seconde (1000 millisecondes)
    }
  }
});
