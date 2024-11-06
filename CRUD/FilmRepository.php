<?php
require_once 'Film.php';
require_once 'Connexion.php'; 

class FilmRepository {
    private $conn;

    public function __construct() {
        $this->conn = Connexion::getConnexion(); 
    }

    
    public function addFilm(Film $film) {
        $sql = "INSERT INTO film (titre, duree, annee_sortie) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$film->getTitre(), $film->getDuree(), $film->getAnneeSortie()]);
    }


    public function getFilm($id) {
        $sql = "SELECT * FROM film WHERE id_film = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        
        if ($result) {
            $film = new Film();
            $film->setIdFilm($result['id_film']);
            $film->setTitre($result['titre']);
            $film->setDuree($result['duree']);
            $film->setAnneeSortie($result['annee_sortie']);
            return $film;
        }
        return null;
    }

    
    public function updateFilm(Film $film) {
        $sql = "UPDATE film SET titre = ?, duree = ?, annee_sortie = ? WHERE id_film = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$film->getTitre(), $film->getDuree(), $film->getAnneeSortie(), $film->getIdFilm()]);
    }

   
    public function deleteFilm($id) {
        $sql = "DELETE FROM film WHERE id_film = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

   
    public function getAllFilms() {
        $sql = "SELECT * FROM film";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
