<?php
if(!isset($_POST['score']) || !isset($_POST['date']))
    die("requête non autorisé");
$con = new mysqli("localhost","root","root","dbname");

$valeur  =$_POST['score'];
$date =$_POST['date'];

$idUtilisateur = 2;

$query2 = "insert into score(`id`,`valeur`,`date`,`idUtilisateur`) values (null,'".$valeur."','".$date."','".$idUtilisateur."');";

$result2 = $con->query($query2);

$con->close();
header('Location: liste1.php');
exit;
?>