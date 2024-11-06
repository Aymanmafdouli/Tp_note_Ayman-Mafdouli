<?php

class Realisateur {
    private $id_realisateur;
    private $nom;
    private $prenom;

    public function getIdRealisateur() {
        return $this->id_realisateur;
    }

    public function setIdRealisateur($id_realisateur) {
        $this->id_realisateur = $id_realisateur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
}
