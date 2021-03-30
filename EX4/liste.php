<?php
$con = new mysqli("localhost","root","root","dbname"); //adresse base de donnée, nom utilisateur, mdp et nom de base de donnée

if($con->connect_error){
    die('#Erreur de connexion ('.$con->connect_errno.') '.$con->connect_error);
}

$query2 = "Select * from score";

$result2 = $con->query($query2);

$code = "<ul>";
while($r=$result2->fetch_assoc()){ //peut utilier fetch_object()
    $code.="<li>".$r['id'].",".$r['valeur'].",".$r['date'].",".$r['idUtilisateur'];
    $code.=" - <a href=\"supprimer.php?id=".$r['id']."\">Supprimer</a> | <a href=\"afficherpourmodif.php?id=".$r['id']."\">Modifier</a></li>";
}
$code .= "</ul>";

$code .= "<a href=\"formulaire2.html\">Creer</a>";

echo $code;

$con->close();
?>