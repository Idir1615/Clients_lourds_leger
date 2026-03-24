<title>Gestion des Locations</title>

<?php
$location = null;

// gestion des actions (supprimer / éditer)
if (isset($_GET['action']) && isset($_GET['idlocation'])) {
    $action = $_GET['action'];
    $idlocation = (int)$_GET['idlocation'];

    switch ($action) {
        case "sup":
            $unControleur->delete_location($idlocation);
            header("Location: index.php?page=5");
            exit;
        case "edit":
            $location = $unControleur->selectWhere_location($idlocation);
            break;
    }
}

// récupérer toutes les appartements et clients pour les <select>
$appartements = $unControleur->selectAll_appartements();
$clients = $unControleur->selectAll_clients();

// ajouter une nouvelle location
if (isset($_POST['Valider'])) {
    $unControleur->insert_location($_POST);
    echo '<div style="text-align:center; color:green; font-weight:bold; font-family:Arial; margin-top:10px;">
            &#10004; Insertion réussie.
          </div>';
}

// modifier une location existante
if (isset($_POST['Modifier'])) {
    $unControleur->update_location($_POST);
    header("Location: index.php?page=5");
    exit;
}

// filtrer les locations
if (isset($_POST['Filtrer']) && !empty($_POST['filtre'])) {
    $filtre = $_POST['filtre'];
    $leslocations = $unControleur->selectLike_location($filtre);
} else {
    $leslocations = $unControleur->selectAll_locations();
}

require_once("vue/vue_insert_location.php");
require_once("vue/vue_select_location.php");
?>
