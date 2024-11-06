<?php

class Acteur {
    private $id_acteur;
    private $nom;
    private $prenom;
    private $role;
    private $date_naissance;

    public function getIdActeur() {
        return $this->id_acteur;
    }

    public function setIdActeur($id_acteur) {
        $this->id_acteur = $id_acteur;
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

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getDateNaissance() {
        return $this->date_naissance;
    }

    public function setDateNaissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }
}
