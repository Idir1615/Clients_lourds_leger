<?php
session_start();

require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

$page = isset($_GET["page"]) ? $_GET["page"] : "1";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neige & Soleil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <!-- Variable JS : utilisateur connecté ou non -->
    <script>
        const isLoggedIn = <?= isset($_SESSION['email']) ? 'true' : 'false' ?>;
    </script>
</head>

<body class="bg-light">

<!--  HEADER  -->
<header class="header-main d-flex justify-content-between align-items-center py-3 px-4">
    <div class="d-flex align-items-center gap-3">
        <a href="index.php" class="logo-link">
            <img src="images/design/logoo.png" alt="Logo Neige & Soleil" class="logo-img">
        </a>
    </div>

    <?php if(isset($_SESSION['email'])): ?>
        <div>
            <a href="index.php?page=6" class="header-btn">Déconnexion</a>
        </div>
    <?php else: ?>
        <div>
            <a href="index.php?page=connexion" class="header-btn">Connexion</a>
        </div>
    <?php endif; ?>
</header>

<!--  NAVIGATION  -->
<?php if(isset($_SESSION['email'])): ?>
<div class="container my-3">
    <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="index.php" class="btn-dashboard">Accueil</a>

        <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'agent'): ?>
            <a href="index.php?page=2" class="btn-dashboard">Appartements</a>
        <?php endif; ?>

        <?php if($_SESSION['role'] == 'admin'): ?>
            <a href="index.php?page=3" class="btn-dashboard">Propriétaires</a>
            <a href="index.php?page=4" class="btn-dashboard">Clients</a>
            <a href="index.php?page=5" class="btn-dashboard">Locations</a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<!--  CONTENU PRINCIPAL  -->
<main class="container my-5">
<?php

// page 1 (accueil) : accessible SANS connexion
if ($page === "1") {
    require_once("controleur/home.php");

// page d'inscription
} elseif ($page === "inscription") {
    require_once("controleur/gestion_inscription.php");
    require_once("vue/vue_inscription.php");

// page de connexion ou non connecté
} elseif ($page === "connexion" || !isset($_SESSION['email'])) {
    echo '<div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">';
    require_once("vue/vue_connexion.php");
    echo '</div>';

    if (isset($_POST['Connexion'])) {
        $email = $_POST['email'];
        $mdp   = $_POST['mdp'];
        $unUser = $unControleur->getModele()->select_user_by_email($email);

        if (!$unUser) {
            echo "<p class='text-danger text-center mt-3'>Veuillez vérifier vos identifiants.</p>";
        } else {
            if (password_verify($mdp, $unUser['mdp'])) {
                session_regenerate_id(true);

                $_SESSION['email']  = $unUser['email'];
                $_SESSION['nom']    = $unUser['nom'];
                $_SESSION['prenom'] = $unUser['prenom'];
                $_SESSION['role']   = $unUser['role'];

                $redirect = $_SESSION['redirect_after_login'] ?? "index.php";
                unset($_SESSION['redirect_after_login']);
                header("Location: " . $redirect);
                exit;
            } else {
                echo "<p class='text-danger text-center mt-3'>Veuillez vérifier vos identifiants.</p>";
            }
        }
    }

// pages après connexion
} else {
    switch($page) {

        // Appartements : accessible à admin ET agent
        case "2":
            if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'agent') {
                require_once("controleur/gestion_appartement.php");
            } else {
                require_once("controleur/erreur.php");
            }
            break;

        // Pages admin uniquement
        case "3":
            if($_SESSION['role'] == 'admin') {
                require_once("controleur/gestion_proprietaire.php");
            } else {
                require_once("controleur/erreur.php");
            }
            break;

        case "4":
            if($_SESSION['role'] == 'admin') {
                require_once("controleur/gestion_client.php");
            } else {
                require_once("controleur/erreur.php");
            }
            break;

        case "5":
            if($_SESSION['role'] == 'admin') {
                require_once("controleur/gestion_location.php");
            } else {
                require_once("controleur/erreur.php");
            }
            break;

        case "6":
            session_destroy();
            unset($_SESSION['email']);
            header("Location: index.php");
            exit;

        default:
            require_once("controleur/erreur.php");
            break;
    }
}
?>
</main>

<!--  footer  -->
<footer class="footer-main text-center py-3">
    &copy; <?= date('Y') ?> Neige & Soleil. Tous droits réservés.
    <img src="images/design/logoo.png" width="50" alt="">
</footer>
</body>
</html>
