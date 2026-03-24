<title> Gestion des Proprietaire </title>

<?php
	$Proprietaire = null; 
		if (isset($_GET['action']) && isset($_GET['idproprio'])){
			$action = $_GET['action']; 
			$idproprio = (int)$_GET['idproprio'];

			switch ($action){
				case "sup":
					$unControleur->delete_proprietaire($idproprio); 
					header("Location: index.php?page=3");
					exit();
				case "edit":
					$Proprietaire = $unControleur->selectWhere_proprietaire($idproprio); 
					break;
			}
		}

	// récupérer tous les propriétaires pour le <select>
	$proprietaires = $unControleur->selectAll_proprietaires();

	require_once ("vue/vue_insert_Proprietaire.php");

	//ajout Proprietaire
	if(isset($_POST['Valider'])){
		$unControleur->insert_Proprietaire ($_POST);
		echo '<div style="text-align:center; color:green; font-weight:bold; font-family:Arial; margin-top:10px;">&#10004; Insertion réussie.</div>';
	}	

	//modifier un Proprietaire
	if(isset($_POST['Modifier'])){
    $unControleur->update_Proprietaire($_POST);
    header("Location: index.php?page=3");
    exit();
	}	

	if(isset($_POST['Filtrer'])){
		//filtrer les Proprietaires par un like sur les champs 
		$filtre = $_POST['filtre']; 
		$lesProprietaires = $unControleur->selectLike_Proprietaire($filtre);
	}else {
		//afficher toutes les Proprietaires 
		$lesProprietaires = $unControleur->selectAll_Proprietaires(); 
	}
	
	require_once("vue/vue_select_proprietaire.php"); 
?>






