<?php

if (!isset ($_GET["action"])) {
	die("requ&ecirc;te non autoris&eacute;e");
}

require "modele.php";

// récupération des données passées en GET
$action = $_GET['action'];

// traitement selon l'action
switch ($action) {
    case "lister":
        lister();
        break;
    case "creer":
        creer();
        break;
    case "modifier":
        modifier();
        break;
	case "supprimer":
	    supprimer();
	    break;
}

// fonctions
function lister(){
	$titre = "Liste de score";
	$con=connexion(); //adresse base de donnée, nom utilisateur, mdp et nom de base de donnée

	if($con->connect_error){
		die('#Erreur de connexion ('.$con->connect_errno.') '.$con->connect_error);
	}
	$titre = "Liste de score";
	$liste = recupereTous();
	fermeture($con);
	require "vue_liste.php";
}
function creer(){
	$mode = "creation";
	// affichage du formulaire
	if ( !isset ($_POST['valeur']) ) {
		// pas de données => affichage
		$donnees = null;
		$erreurs = null;
		afficherFormulaire($mode, $donnees, $erreurs);
	} else {
		// données => test
		$erreurs = testDonnees($_POST);
		if ($erreurs == null){
			// ajout
			ajouteEnregistrement($_POST);
			// redirection (sinon l'url demeurera action=creer)
			header ('Location:controleur.php?action=lister');
		} else {
			afficherFormulaire($mode, $_POST, $erreurs);
		}
	}
}
function supprimer(){
	if ( !isset ($_GET["id"]) ) {
		// pas de données 
		die("requ&ecirc;te non autoris&eacute;e");
	}
	supprimeEnregistrement($_GET["id"]);
	lister();
}
function modifier(){
	if ( !isset ($_GET["id"]) && !isset ($_POST["id"])) {
		// pas de données 
		die("requ&ecirc;te non autoris&eacute;e");
	}
	$mode = "modification";
	// affichage du formulaire
	if ( !isset ($_POST["valeur"]) ) {
		// pas de données en POST (mais en GET) => affichage avec les données de l'enregistrement
		$donnees = recupereEnregistrementParId($_GET["id"]);
		$donnees['id'] = $_GET["id"];
		$erreurs = null;
		afficherFormulaire($mode, $donnees, $erreurs);
	} else {
		// données en POST => test
		$erreurs = testDonnees($_POST);
		if ($erreurs == null){
			// ajout
			modifieEnregistrement($_POST["id"], $_POST);
			lister();
		} else {
			afficherFormulaire($mode, $_POST, $erreurs);
		}
	}
}
function afficherFormulaire($mode, $donnees, $erreurs){
	if($mode == "creation"){
		$titre = "Création";
		$action = "creer";
	} else	if($mode == "modification"){
		$titre = "Modification";
		$action = "modifier";
	}
	// affichage de la vue
	require "vue_edition.php"; 	
}

function testDonnees($donnees){
	$erreurs = [];
	// test si le score est une valeur numérique
	if (!is_numeric($donnees['valeur'])) {
		$erreurs['valeur'] = "la valeur entrée doit être un nombre";
	}
	return $erreurs;
}

?>