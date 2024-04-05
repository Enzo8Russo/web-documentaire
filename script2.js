const chatBox = document.getElementById('chat-box');
const userInput = document.getElementById('user-input');

const predefinedMessages = [
  "Natan : Hey, est ce que tu saurais où j'ai posé mes tickets de bus, j’en ai besoin pour   aller faire des courses.",
  "John : Je crois que tu les avais posées sur ta commode dans le salon.",
  "Natan : Effectivement, merci John. Tu avances sur ton enquête ?",
  "John : Je pense avoir trouvé une piste menant au coupable, mais je crois que ces nouveaux éléments ne sont pas ceux que j’attendais..",
  "Natan : Sérieusment ? Je ne comprends pas tout mais sache que tu as mon soutiens",
  "John : Merci j'y retourne, je vais mettre un peu d’ordre dans mon affaire puis je rentrerai à la maison.",
  "Natan : Bon courage, je te laisse travailler, j’ai des courses à faire."
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