<?php
require_once 'Acteur.php';
require_once 'Connexion.php'; 

class ActeurRepository {
    private $conn;

    public function __construct() {
        $this->conn = Connexion::getConnexion(); 
    }

    // Create (Ajouter un acteur)
    public function addActeur(Acteur $acteur) {
        $sql = "INSERT INTO acteur (nom, prenom, role, date_naissance) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$acteur->getNom(), $acteur->getPrenom(), $acteur->getRole(), $acteur->getDateNaissance()]);
        echo "Acteur ajouté avec succès.";
    }

    // Read (Lire les informations d'un acteur)
    public function getActeur($id) {
        $sql = "SELECT * FROM acteur WHERE id_Acteur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        
        if ($result) {
            $acteur = new Acteur();
            $acteur->setIdActeur($result['id_Acteur'] ?? null);
            $acteur->setNom($result['nom'] ?? '');
            $acteur->setPrenom($result['prenom'] ?? '');
            $acteur->setRole($result['role'] ?? '');
            $acteur->setDateNaissance($result['Date_naissance'] ?? '');
            return $acteur;
        }
        echo "Aucun acteur trouvé avec cet ID.";
        return null;
    }

    // Update (Mettre à jour un acteur)
    public function updateActeur(Acteur $acteur) {
        $sql = "UPDATE acteur SET nom = ?, prenom = ?, role = ?, date_naissance = ? WHERE id_Acteur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $acteur->getNom(), 
            $acteur->getPrenom(), 
            $acteur->getRole(), 
            $acteur->getDateNaissance(), 
            $acteur->getIdActeur()
        ]);
        echo "Acteur mis à jour avec succès.";
    }

    // Delete (Supprimer un acteur) avec gestion de la contrainte d'intégrité
    public function deleteActeur($id) {
        // Supprimer les lignes dépendantes dans la table `jouer` avant de supprimer l'acteur
        $this->conn->prepare("DELETE FROM jouer WHERE id_Acteur = ?")->execute([$id]);

        $sql = "DELETE FROM acteur WHERE id_Acteur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        echo "Acteur supprimé avec succès.";
    }

    // Liste tous les acteurs
    public function getAllActeurs() {
        $sql = "SELECT * FROM acteur";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
