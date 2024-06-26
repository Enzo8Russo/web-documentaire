<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Documentaire - Start</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }

        .content {
            color: #fff;
            font-size: 40px;
        }

        /* Style pour le bouton */
        .custom-button {
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            font-size: 18px;
        }
    </style>
</head>
<body>
  <img class="background_1" src="img/rectangle_1.jpg">
    <div class="container">
        <div class="content">
            <h1>
                Jour 1 : <br><br> 14 juin 2007
            </h1>
            <br><br>
            <button class="custom-button" onclick="playSoundAndRedirect()">Aller au bureau</button>
        </div>
    </div>

    <!-- Audio element for playing sound -->
    <audio id="sound" src="music/morning-sound.mp3"></audio>

    <script>
        function playSoundAndRedirect() {
            var audio = document.getElementById('sound');
            audio.play();
            
            setTimeout(function() {
                redirect();
            }, 5000); // Rediriger après 5 secondes
        }

        function redirect() {
            window.location.href = "bureau_days_1.php";
        }

        
    </script>
</body>
</html>
