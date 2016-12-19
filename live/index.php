<!DOCTYPE html>
<html>
<head>
    <title>PHP Websecurity</title>
</head>
<body>
    <h1>PHP Websecurity</h1>

    <?php
    mysql_connect("localhost", "root", "root");
    $link = mysql_select_db("php-websecurity");

    if ( isset($_POST['username']) )
    {
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string(md5($_POST['password']);

        $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = ('$password')";
        echo "De SQL query die we uit gaan voeren is: <br><code>".$sql."</code>";

        $result = mysql_query( $sql );
        if ( mysql_num_rows($result) == 0 )
        {
            echo "<p>Je bent niet ingelogd.</p>";
        }
        else
        {
            echo "<p>Hoi ".$username.", je bent ingelogd!</p>";
            $array = mysql_fetch_assoc($result);
            echo "<pre>".print_r( $array, true )."</pre>";
        }
    }
    ?>

    <form method="post" action="index.php">
        <label for="username">Gebruikersnaam:</label><br>
        <input type="text" name="username" value=""><br>
        <br>
        <label for="password">Wachtwoord:</label><br>
        <input type="text" name="password" style="width: 100%" value=""><br>
        <br>
        <input type="submit" name="submit" value="inloggen">
    </form>
</body>
</html>