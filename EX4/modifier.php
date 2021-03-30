<?php
if(!isset($_GET['id']))
    die("requête non autorisée");
$con = new mysqli("localhost","root","root","dbname");

$id= $_POST['id'];
$valeur = $_POST['valeur']; 

$query2 = "update score set `valeur`=$valeur where id = $id;";

$result2= $con->query($query2);

$con->close();

header("Location:liste.php");
exit;
?>