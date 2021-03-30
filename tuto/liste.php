<?php
$con = new mysqli("localhost","mooc","#m_ad","mooc_ad"); //adresse base de donnée, nom utilisateur, mdp et nom de base de donnée

$query2 = "Select * from score";

$result2 = $con->query($query2);

$code = "<ul>";
while($r=$result2->fetch_assoc()) //fetch_object()
    $code.="<li>".$r['id'].",".$r['valeur'].",".$r['date'].",".$r['idUtilisateur']."</li>";
$code .= "</ul>";

echo $code;

mysqli_close($con);
?>