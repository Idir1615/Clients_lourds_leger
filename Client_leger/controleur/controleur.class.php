<?php
require_once("modele/modele.class.php");

class Controleur
{
    // Attributs
    private $unModele;

    // Constructeur
    public function __construct()
    {
        $this->unModele = new Modele();
    }

    // Accesseur modèle
    public function getModele() {
        return $this->unModele;
    }

    // Vérification de connexion
    public function verifConnexion()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit();
        }
    }

    // Gestion des Appartements

    // Insérer un appartement
    public function insert_appartement($tab)
    {
        $this->unModele->insert_appartement($tab);
    }

    // Sélectionner tous les appartements
    public function selectAll_appartements()
    {
        return $this->unModele->selectAll_appartements();
    }

    // Rechercher des appartements selon un filtre
    public function selectLike_appartement($filtre)
    {
        return $this->unModele->selectLike_appartement($filtre);
    }

    // Supprimer un appartement
    public function delete_appartement($idappart)
    {
        $this->unModele->delete_appartement($idappart);
    }

    // Mettre à jour un appartement
    public function update_appartement($tab)
    {
        $this->unModele->update_appartement($tab);
    }

    // Sélectionner un appartement spécifique
    public function selectWhere_appartement($idappart)
    {
        return $this->unModele->selectWhere_appartement($idappart);
    }

    // Gestion des Propriétaires

    // Insérer un propriétaire
    public function insert_proprietaire($tab)
    {
        $this->unModele->insert_proprietaire($tab);
    }

    // Sélectionner tous les propriétaires
    public function selectAll_proprietaires()
    {
        return $this->unModele->selectAll_proprietaires();
    }

    // Rechercher des propriétaires selon un filtre
    public function selectLike_proprietaire($filtre)
    {
        return $this->unModele->selectLike_Proprietaire($filtre);
    }

    // Supprimer un propriétaire
    public function delete_proprietaire($idproprietaire)
    {
        $this->unModele->delete_Proprietaire($idproprietaire);
    }

    // Mettre à jour un propriétaire
    public function update_proprietaire($tab)
    {
        $this->unModele->update_Proprietaire($tab);
    }

    // Sélectionner un propriétaire spécifique
    public function selectWhere_proprietaire($idproprietaire)
    {
        return $this->unModele->selectWhere_Proprietaire($idproprietaire);
    }

    // Gestion des Clients

    // Insérer un client
    public function insert_client($tab)
    {
        $this->unModele->insert_client($tab);
    }

    // Sélectionner tous les clients
    public function selectAll_clients()
    {
        return $this->unModele->selectAll_clients();
    }

    // Rechercher des clients selon un filtre
    public function selectLike_client($filtre)
    {
        return $this->unModele->selectLike_Client($filtre);
    }

    // Supprimer un client
    public function delete_client($idclient)
    {
        $this->unModele->delete_Client($idclient);
    }

    // Mettre à jour un client
    public function update_client($tab)
    {
        $this->unModele->update_Client($tab);
    }

    // Sélectionner un client spécifique
    public function selectWhere_client($idclient)
    {
        return $this->unModele->selectWhere_Client($idclient);
    }

    // Gestion des Utilisateurs (Connexion)

    // Sélectionner un utilisateur pour login
    public function select_user($email, $mdp)
    {
        return $this->unModele->select_user($email, $mdp);
    }

    // Gestion des Locations

    // Insérer une location
    public function insert_location($tab)
    {
        $this->unModele->insert_location($tab);
    }

    // Sélectionner toutes les locations
    public function selectAll_locations()
    {
        return $this->unModele->selectAll_locations();
    }

    // Rechercher des locations selon un filtre
    public function selectLike_location($filtre)
    {
        return $this->unModele->selectLike_location($filtre);
    }

    // Supprimer une location
    public function delete_location($idlocation)
{
    $this->unModele->delete_location($idlocation);
}


    // Mettre à jour une location
    public function update_location($tab)
    {
        $this->unModele->update_location($tab);
    }

    // Sélectionner une location spécifique
    public function selectWhere_location($idlocation)
    {
        return $this->unModele->selectWhere_location($idlocation);
    }
}
