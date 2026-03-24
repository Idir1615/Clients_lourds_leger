<title>Gestion des Clients</title>

<?php
$Client = null; 

// vérifier si action edit ou sup existe
if (isset($_GET['action']) && isset($_GET['idclient'])) {
    $action = $_GET['action']; 
    $idclient = (int)$_GET['idclient'];

    switch ($action) {
        case "sup":
            $unControleur->delete_Client($idclient); 
            header("Location: index.php?page=4");
            exit();
        case "edit":
            $Client = $unControleur->selectWhere_Client($idclient); 
            break;
    }
}

// récupérer tous les clients
$clients = $unControleur->selectAll_Clients();

// affichage du formulaire
require_once("vue/vue_insert_client.php");

// ajout Client
if (isset($_POST['Valider'])) {
    $unControleur->insert_Client($_POST);
    echo '<div style="text-align:center; color:green; font-weight:bold; font-family:Arial; margin-top:10px;">&#10004; Insertion réussie.</div>';
}

// modification Client
if (isset($_POST['Modifier'])) {
    $unControleur->update_Client($_POST);
    header("Location: index.php?page=4");
    exit();
}

// filtrer les clients
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre']; 
    $lesClients = $unControleur->selectLike_Client($filtre);
} else {
    $lesClients = $unControleur->selectAll_Clients();
}

require_once("vue/vue_select_client.php"); 
?>
