<?php

class Film {
    private $id_film;
    private $titre;
    private $duree;
    private $annee_sortie;

    
    public function getIdFilm() {
        return $this->id_film;
    }

    public function setIdFilm($id_film) {
        $this->id_film = $id_film;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
    }

    public function getAnneeSortie() {
        return $this->annee_sortie;
    }

    public function setAnneeSortie($annee_sortie) {
        $this->annee_sortie = $annee_sortie;
    }
}
