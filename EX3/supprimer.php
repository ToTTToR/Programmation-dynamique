<?php
if(!isset($_GET['id']))
    die("requête non autorisée");
$con = new mysqli("localhost","root","root","dbname");

$id= $_GET['id'];

$query2 = "Delete from score where id = $id";

$result2= $con->query($query2);

$con->close();

header("Location:liste.php");
exit;
?>