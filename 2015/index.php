<!DOCTYPE html>
<html>
<head>
    <title>PHP Websecurity</title>

    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        .demo-card-square.mdl-card {
            width: 512px;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<div class="demo-card-square mdl-card mdl-shadow--2dp">
    <div class="mdl-card__supporting-text">
        <?php
        // Check of het formulier is gepost
        if ( isset($_POST) ) {
            // Toon de ingegeven gebruikersnaam en wachtwoord
            echo "<p>Gebruikersnaam: <code><strong>".$_POST['username']."</strong></code></p>";
            echo "<p>Wachtwoord: <code><strong>".$_POST['password']."</strong></code></p>";

            // Gebruikersnaam en wachtwoord opslaan in variabelen
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Database connectie maken
            mysql_connect('localhost', 'root', 'root');

            // De database selecteren
            mysql_select_db('php-websecurity');

            // SQL query opbouwen om de gebruiker uit de tabel `users` te selecteren
            // op basis van de ingegeven gebruikersnaam en wachtwoord
            $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";

            // We printen de opgebouwde query zodat we kunnen zien wat er gaat gebeuren
            echo "<p><code>".$sql."</code></p>";

            // Query uitvoeren op de database
            $result = mysql_query($sql);

            // Als de query is mislukt, dan tonen we de foutmelding
            if ( $result === false ) echo "<p>De query kon niet uitgevoegd worden. Error: ".mysql_error()."</p>";

            // Check of er een rij (user) is gevonden
            if ( mysql_num_rows($result) > 0 )
            {
                echo "<h5>Hoi <strong>".$username."</strong>! Je bent ingelogd!</h5>";
                echo "<pre>". print_r( mysql_fetch_assoc($result), true ) . "</pre>";
            }
            else
            {
                echo "<p>Je gegevens zijn onjuist!</p>";
            }
        }
        ?>
    </div>
</div>

<form action="index.php" method="post">
    <div class="demo-card-square mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Login</h2>
        </div>
        <div class="mdl-card__supporting-text">
            Hoi en welkom. Log hieronder in met je gebruikersnaam en wachtwoord.

            <br>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="username" type="text" id="username">
                <label class="mdl-textfield__label" for="username">Gebruikersnaam</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="password" id="password">
                <label class="mdl-textfield__label" for="password">Wachtwoord</label>
            </div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <input type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Inloggen">
        </div>
    </div>
</form>

</body>
</html>