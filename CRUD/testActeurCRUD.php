<?php

require_once 'ActeurRepository.php';

$repo = new ActeurRepository();



// Lire les informations d'un acteur
$acteurFetched = $repo->getActeur(1);
if ($acteurFetched) {
    echo "Acteur ID " . $acteurFetched->getIdActeur() . " trouvé : " . $acteurFetched->getNom() . " " . $acteurFetched->getPrenom();
}

// Mettre à jour un acteur
$acteurFetched->setNom("DiCaprio");
$repo->updateActeur($acteurFetched);

// Supprimer un acteur
$repo->deleteActeur(1);

// Afficher tous les acteurs
$acteurs = $repo->getAllActeurs();
foreach ($acteurs as $act) {
    echo "ID: " . $act['id_Acteur'] . " Nom: " . $act['nom'] . " Prénom: " . $act['prenom'] . "<br>";
}
