<?php
//database connectie word opgezet
mysql_connect('localhost','root','');
$db = mysql_select_db('wassink');

//Wanneer het formulier POST gegevens verstuurd heeft worden gebruikers gegevens gevalideerd.
if($_POST) {

    // variabelen voor ingevoerde gegevens worden gedeclareerd.
    $username = $_POST['username'];
    $password = $_POST['password'];

    //query word aan de hand van ingevoerde gegevens opgebouwd.
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    //De query word uitgevoerd en het resultaat word opgehaald.
    $select = mysql_query($query);
    $result = mysql_fetch_assoc($select);
    
    //hieronder worden de ingevoerde gegevens getoond (gebruikernaam en wachtwoord)
    echo '<div class="data">';
    echo 'invoer Username: <b>'.$username.'</b>';
    echo '<br/><br/>';

    echo 'invoer Password: <b>'.$password.'</b>';
    echo '<br/><br/>';

    // Hier word op het scherm getoond welke query er op de database word uitgevoerd.
    echo 'Query: '.$query;
    echo '<br/><br/>';
    
    //Het resultaat van de query word getoond.
    echo 'Result: ';
    var_dump($result);
    echo '</div>';
    
}
?>

<style>
    div.form {
        border: 1px solid black;
        width: 400px;
        height: 400px;
        margin: 0 auto;
    }
    div.data {
        background: #bebebe;
        border: 3px inset red;
        padding: 5px;
    }
    form {
        padding: 30px;
    }
    input[type='text'] {
        width: 300px;
    }
    p {
        padding: 10px;
        background: #bebebe;
        color: red;
        font-weight: bold;
    }
</style>

<div class="form">
    
    <p>
        <?php
        //Er word gecontrolleerd of de gebruiker succesvol is ingelogd.
        if(isset($result)) {
            if(isset($result['username']) && isset($result['password'])) {
                echo "<b>Hallo ".$result['username'].' u bent ingelogd!</b>';
            }else{
                echo "Uw wachtwoord en gebruikersnaam zijn incorrect";
            }
        }
        ?>
    </p>
    
    <form action="index.php" method="post">
        Gebruikersnaam:<br/> 
        <input type="text" name="username"/><br/>
        
        Wachtwoord:<br/> 
        <input type="text" name="password"/><br/>
        
        <input type="submit" name="submit"/>
    </form>
</div>
