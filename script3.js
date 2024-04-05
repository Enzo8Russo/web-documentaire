const chatBox = document.getElementById('chat-box');
const userInput = document.getElementById('user-input');

// Messages prédéfinis
const predefinedMessages = [
  "Natan : Salut John, ça va ??",
  "John: Salut Natan, tout va mieux pour moi. Comment tu te sens aujourd'hui ?",
  "Natan : Ca pourrait aller mieux. Les nuits sont toujours agitées.",
  "John: Je suis désolé d'entendre ça. Je reviens bientôt ne t’inquiète pas",
  "Natan : Ouais, peut-être, mais tu sais, ce n'est pas facile.",
  "John: Je comprends. Mais sache que je suis là pour toi si jamais tu veux en parler.",
  "Natan : Merci John, ça compte beaucoup pour moi. Ah ! Attends un peu John je dois te laisser ça sonne à la porte.",
  "John : Pas de problème.",
  "Natan : Fausse alerte ,il n’y personne, pourtant je pensais avoir entendu sonner.",
  "John: Excuse-moi Natan, je dois terminer rapidement. On se reparle ce soir ?",
  "Natan : Pas de problème, prends ton temps. À ce soir."
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

userInput.addEventListener('keydown', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault();

    const predefinedText = predefinedMessages[currentMessageIndex];

    displayMessage(predefinedText);
    userInput.value = '';
    currentMessageIndex++;

    if (currentMessageIndex === predefinedMessages.length) {
      const countdownElement = document.createElement('span');
      countdownElement.id = 'countdown';
      countdownElement.style.fontSize = '18px';
      countdownElement.textContent = 'Redirection dans : 5 secondes';

      const containerChat = document.getElementById('container_chat');
      containerChat.appendChild(countdownElement);

      let seconds = 5;

      const countdownInterval = setInterval(function() {
        seconds--;
        countdownElement.textContent = 'Redirection dans : ' + seconds + ' secondes';

        if (seconds <= 0) {
          clearInterval(countdownInterval);
          window.location.href = 'days_2.php';
        }
      }, 1000);
    }
  }
});