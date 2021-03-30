<?php
if(!isset($_GET['id']))
    die("requête non autorisée");
    
$con = new mysqli("localhost","root","root","dbname");

$id= $_GET['id'];

$query2 = "Select * from score where id = $id limit 1";

$result2= $con->query($query2);
$unEnregistrement = $result->fetch_object();
$id = $unEnregistrement->id;
$valeur = $unEnregistrement->valeur;
$date = $unEnregistrement->date;
$idUtilisateur = $unEnregistrement->idUtilisateur;

require('formulaire.php');

$con->close();
?>