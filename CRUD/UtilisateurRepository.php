<?php
require_once 'Utilisateur.php';
require_once 'Connexion.php';

class UtilisateurRepository {
    private $conn;

    public function __construct() {
        $this->conn = Connexion::getConnexion();
    }

    public function addUtilisateur(Utilisateur $utilisateur) {
        $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$utilisateur->getNom(), $utilisateur->getPrenom(), $utilisateur->getEmail(), $utilisateur->getMotDePasse(), $utilisateur->getRole()]);
    }

    public function getUtilisateur($id) {
        $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        if ($result) {
            $utilisateur = new Utilisateur();
            $utilisateur->setIdUtilisateur($result['id_utilisateur']);
            $utilisateur->setNom($result['nom']);
            $utilisateur->setPrenom($result['prenom']);
            $utilisateur->setEmail($result['email']);
            $utilisateur->setMotDePasse($result['mot_de_passe']);
            $utilisateur->setRole($result['role']);
            return $utilisateur;
        }
        return null;
    }

    public function updateUtilisateur(Utilisateur $utilisateur) {
        $sql = "UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, mot_de_passe = ?, role = ? WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$utilisateur->getNom(), $utilisateur->getPrenom(), $utilisateur->getEmail(), $utilisateur->getMotDePasse(), $utilisateur->getRole(), $utilisateur->getIdUtilisateur()]);
    }

    public function deleteUtilisateur($id) {
        $sql = "DELETE FROM utilisateur WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function getAllUtilisateurs() {
        $sql = "SELECT * FROM utilisateur";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
