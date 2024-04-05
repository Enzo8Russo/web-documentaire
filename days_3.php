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
    </style>
</head>
<body>
  <img class="background_1" src="img/rectangle_1.jpg">
    <div class="container">
        <div class="content">
            <h1>
                Jour 3 : <br><br> 16 juin 2007
            </h1>
            <br><br>
            <span id="countdown" style="font-size: 18px;">Redirection vers le bureau dans : 5 secondes</span>
        </div>
    </div>
    <script>
        function redirect() {
            window.location.href = "bureau_days_3.php";
        }

        var seconds = 5;
        var countdownElement = document.getElementById('countdown');

        var countdownInterval = setInterval(function() {
            seconds--;
            countdownElement.textContent = "Redirection vers le bureau dans : " + seconds + " secondes";

            if (seconds <= 0) {
                clearInterval(countdownInterval);
                redirect();
            }
        }, 1000);
    </script>
</body>
</html>
