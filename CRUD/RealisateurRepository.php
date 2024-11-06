<?php
require_once 'Realisateur.php';
require_once 'Connexion.php';

class RealisateurRepository {
    private $conn;

    public function __construct() {
        $this->conn = Connexion::getConnexion();
    }

    public function addRealisateur(Realisateur $realisateur) {
        $sql = "INSERT INTO realisateur (nom, prenom) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$realisateur->getNom(), $realisateur->getPrenom()]);
    }

    public function getRealisateur($id) {
        $sql = "SELECT * FROM realisateur WHERE id_realisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        if ($result) {
            $realisateur = new Realisateur();
            $realisateur->setIdRealisateur($result['id_realisateur']);
            $realisateur->setNom($result['nom']);
            $realisateur->setPrenom($result['prenom']);
            return $realisateur;
        }
        return null;
    }

    public function updateRealisateur(Realisateur $realisateur) {
        $sql = "UPDATE realisateur SET nom = ?, prenom = ? WHERE id_realisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$realisateur->getNom(), $realisateur->getPrenom(), $realisateur->getIdRealisateur()]);
    }

    public function deleteRealisateur($id) {
        $sql = "DELETE FROM realisateur WHERE id_realisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function getAllRealisateurs() {
        $sql = "SELECT * FROM realisateur";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
