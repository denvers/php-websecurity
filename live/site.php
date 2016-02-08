<!DOCTYPE html>
<html>
<head>
    <title>Mijn website</title>
</head>
<body>
<?php include('menu.php'); ?>

<hr>

<?php
if ( isset($_GET['pagina']) )
{
    echo file_get_contents("pages/" . $_GET['pagina'] . '.php');
}
?>
</body>
</html>