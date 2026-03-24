<?php
class Modele {
    private $unPdo;

    // Constructeur : connexion à la base de données
    public function __construct() {
        $url = "mysql:host=localhost;dbname=ns";
        $user = "root";
        $mdp = "";
        try { 
            $this->unPdo = new PDO($url, $user, $mdp);
            $this->unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            echo "Erreur de Connexion à " . $url . "<br>";
            echo $exp->getMessage();
            exit();
        }
    }

    // Gestion des Utilisateurs
    public function select_user($email, $mdp) {
        $requete = "SELECT * FROM Utilisateur WHERE email = :email AND mdp = :mdp";
        $stmt = $this->unPdo->prepare($requete);
        $stmt->execute([":email" => $email, ":mdp" => $mdp]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertUser($nom, $prenom, $email, $mdp) {
        $requete = "INSERT INTO Utilisateur (nom, prenom, email, mdp)
                    VALUES (:nom, :prenom, :email, :mdp)";
        $stmt = $this->unPdo->prepare($requete);
        $stmt->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":email" => $email,
            ":mdp" => $mdp
        ]);
    }

    public function select_user_by_email($email) {
        $requete = "SELECT * FROM Utilisateur WHERE email = :email";
        $stmt = $this->unPdo->prepare($requete);
        $stmt->execute([":email" => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
public function insert_appartement($tab) {
    $requete = "INSERT INTO Appartement (idappart, adresse, surface, designation, idproprio, image)
                VALUES (null, :adresse, :surface, :designation, :idproprio, :image)";
    $exec = $this->unPdo->prepare($requete);
    $exec->execute([
        ":adresse" => $tab['adresse'],
        ":surface" => $tab['surface'],
        ":designation" => $tab['designation'],
        ":idproprio" => $tab['idproprio'],
        ":image" => $tab['image'] ?? null  
    ]);
}


    public function selectAll_appartements() {
        $requete = "SELECT * FROM appartement";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_appartement($filtre) {
        $requete = "SELECT * FROM appartement WHERE adresse LIKE :filtre";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":filtre" => "%" . $filtre . "%"]);
        return $exec->fetchAll();
    }

    public function delete_appartement($idappart) {
        $requete = "DELETE FROM appartement WHERE idappart = :idappart";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idappart" => $idappart]);
    }

   public function update_appartement($tab) {
    $requete = "UPDATE appartement 
                SET adresse = :adresse, surface = :surface, designation = :designation, 
                    idproprio = :idproprio, image = :image
                WHERE idappart = :idappart";
    $exec = $this->unPdo->prepare($requete);
    $exec->execute([
        ":idappart" => $tab['idappart'],
        ":adresse" => $tab['adresse'],
        ":surface" => $tab['surface'],
        ":designation" => $tab['designation'],
        ":idproprio" => $tab['idproprio'],
        ":image" => $tab['image'] ?? null
    ]);
}


    public function selectWhere_appartement($idappart) {
        $requete = "SELECT * FROM appartement WHERE idappart = :idappart";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idappart" => $idappart]);
        return $exec->fetch();
    }

    // Gestion des Propriétaires
    public function insert_proprietaire($tab) {
        $requete = "INSERT INTO proprietaire VALUES (null, :nom, :prenom, :email, :adresse)";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":adresse" => $tab['adresse']
        ]);
    }

    public function selectAll_proprietaires() {
        $requete = "SELECT * FROM proprietaire";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_proprietaire($filtre) {
        $requete = "SELECT * FROM proprietaire WHERE nom LIKE :filtre";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":filtre" => "%" . $filtre . "%"]);
        return $exec->fetchAll();
    }

    public function delete_proprietaire($idproprio) {
        $requete = "DELETE FROM proprietaire WHERE idproprio = :idproprio";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idproprio" => $idproprio]);
    }

    public function update_proprietaire($tab) {
        $requete = "UPDATE proprietaire 
                    SET nom = :nom, prenom = :prenom, email = :email, adresse = :adresse 
                    WHERE idproprio = :idproprio";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([
            ":idproprio" => $tab['idproprio'],
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":adresse" => $tab['adresse']
        ]);
    }

    public function selectWhere_proprietaire($idproprio) {
        $requete = "SELECT * FROM proprietaire WHERE idproprio = :idproprio";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idproprio" => $idproprio]);
        return $exec->fetch();
    }

    // Gestion des Clients
    public function insert_client($tab) {
        $requete = "INSERT INTO client VALUES (null, :nom, :prenom, :email, :adresse)";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":adresse" => $tab['adresse']
        ]);
    }

    public function selectAll_clients() {
        $requete = "SELECT * FROM client";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_Client($filtre) {
        $requete = "SELECT * FROM client WHERE nom LIKE :filtre";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":filtre" => "%" . $filtre . "%"]);
        return $exec->fetchAll();
    }

    public function delete_Client($idclient) {
        $requete = "DELETE FROM Client WHERE idclient = :idclient";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idclient" => $idclient]);
    }

    public function update_Client($tab) {
        $requete = "UPDATE Client 
                    SET nom = :nom, prenom = :prenom, email = :email, adresse = :adresse 
                    WHERE idclient = :idclient";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([
            ":idclient" => $tab['idclient'],
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":adresse" => $tab['adresse']
        ]);
    }

    public function selectWhere_Client($idclient) {
        $requete = "SELECT * FROM Client WHERE idclient = :idclient";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idclient" => $idclient]);
        return $exec->fetch();
    }

    // Gestion des Locations
    public function insert_location($tab) {
        $requete = "INSERT INTO location VALUES (null, :dateDebut, :dateFin, :description, :idappart, :idclient)";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([
            ":dateDebut" => $tab['dateDebut'],
            ":dateFin" => $tab['dateFin'],
            ":description" => $tab['description'],
            ":idappart" => $tab['idappart'],
            ":idclient" => $tab['idclient']
        ]);
    }

    public function selectAll_locations() {
        $requete = "SELECT * FROM location";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_location($filtre) {
        $requete = "SELECT * FROM location WHERE description LIKE :filtre";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":filtre" => "%" . $filtre . "%"]);
        return $exec->fetchAll();
    }

    public function delete_location($idlocation) {
        $requete = "DELETE FROM location WHERE idlocation = :idlocation";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idlocation" => $idlocation]);
    }

    public function update_location($tab) {
        $requete = "UPDATE location 
                    SET dateDebut = :dateDebut, dateFin = :dateFin, description = :description, idappart = :idappart, idclient = :idclient
                    WHERE idlocation = :idlocation";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([
            ":idlocation" => $tab['idlocation'],
            ":dateDebut" => $tab['dateDebut'],
            ":dateFin" => $tab['dateFin'],
            ":description" => $tab['description'],
            ":idappart" => $tab['idappart'],
            ":idclient" => $tab['idclient']
        ]);
    }

    public function selectWhere_location($idlocation) {
        $requete = "SELECT * FROM location WHERE idlocation = :idlocation";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute([":idlocation" => $idlocation]);
        return $exec->fetch();
    }
}
?>
