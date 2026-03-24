<title>Gestion des Appartements</title>

<?php
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

$appartement = null;

// gestion actions GET
if (isset($_GET['action'], $_GET['idappart'])) {
    $action = $_GET['action'];
    $idappart = (int)$_GET['idappart'];

    switch ($action) {
        case "sup":
            $unControleur->delete_appartement($idappart);
            header("Location: index.php?page=2");
            exit();
        case "edit":
            $appartement = $unControleur->selectWhere_appartement($idappart);
            break;
    }
}

// récupérer tous les propriétaires
$proprietaires = $unControleur->selectAll_proprietaires();

// fonction pour upload d'image
function handleImageUpload($files) {
    $targetDir = "images/biens/";
    if(!is_dir($targetDir)) mkdir($targetDir, 0755, true);

    $imagePaths = [];

    // si c'est un seul fichier (pas de tableau)
    if (!is_array($files['name'])) {
        if ($files['error'] === UPLOAD_ERR_OK) {
            $fileName = time() . "_" . basename($files['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($files['tmp_name'], $targetFile);
            return $targetFile;
        }
        return null;
    }

    // si plusieurs fichiers
    foreach ($files['tmp_name'] as $key => $tmpName) {
        if ($files['error'][$key] === UPLOAD_ERR_OK) {
            $fileName = time() . "_" . basename($files['name'][$key]);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($tmpName, $targetFile);
            $imagePaths[] = $targetFile;
        }
    }

    return implode(",", $imagePaths);
}

// ajout appartement
if (isset($_POST['Valider'])) {
    if(!empty($_FILES['image']['name'][0])) {
        $_POST['image'] = handleImageUpload($_FILES['image']);
    }
    $unControleur->insert_appartement($_POST);
    echo '<div style="text-align:center; color:green; font-weight:bold;">&#10004; Appartement ajouté.</div>';
}

// modification appartement
if (isset($_POST['Modifier'])) {
    if(!empty($_FILES['image']['name'][0])) {
        $_POST['image'] = handleImageUpload($_FILES['image']);
    } else {
        $_POST['image'] = $appartement['image'] ?? null;
    }
    $unControleur->update_appartement($_POST);
    header("Location: index.php?page=2");
    exit();
}

// filtrage
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
    $lesAppartements = $unControleur->selectLike_appartement($filtre);
} else {
    $lesAppartements = $unControleur->selectAll_appartements();
}

// création d’un tableau images pour chaque appartement pour JS**
foreach ($lesAppartements as &$appart) {
    $appart['images'] = !empty($appart['image']) ? array_map('trim', explode(',', $appart['image'])) : [];
}

// div pour JS
echo '<div id="cards" data-apartments=\''.json_encode($lesAppartements).'\'></div>';

require_once("vue/vue_insert_appartement.php");
require_once("vue/vue_select_appartement.php");
?>
