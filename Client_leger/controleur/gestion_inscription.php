<?php
// Vérifie si le formulaire a été soumis via le bouton "inscrire"
if (isset($_POST['inscrire'])) {
 
    // Récupération des données du formulaire
    $nom    = trim($_POST['nom']);       // Nom de l'utilisateur
    $prenom = trim($_POST['prenom']);    // Prénom de l'utilisateur
    $email  = trim($_POST['email']);     // Email de l'utilisateur
    $mdp    = $_POST['mdp'];             // Mot de passe (non hashé)
 
    // Vérifie que les champs obligatoires ne sont pas vides
    if (empty($nom) || empty($prenom) || empty($email) || empty($mdp)) {
        echo "<p class='text-danger text-center mt-3'>
                Tous les champs sont obligatoires.
              </p>";
    }
    // Vérifie si l'email existe déjà en base de données
    else {
 
        $userExist = $unControleur->getModele()->select_user_by_email($email);
 
        if ($userExist) {
            // Email déjà utilisé
            echo "<p class='text-danger text-center mt-3'>
                    Cet email est déjà utilisé.
                  </p>";
        }
        else {
            // Hash sécurisé du mot de passe
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
 
            // Insertion de l'utilisateur dans la base
            $unControleur->getModele()->insertUser($nom, $prenom, $email, $mdpHash);
 
            // Message de succès
            echo "<p class='text-success text-center mt-3'>
                    Inscription réussie ! Vous pouvez vous connecter.
                  </p>";
        }
    }
}
 
// Chargement de la vue inscription
require_once("vue/vue_inscription.php");
?>
 
 