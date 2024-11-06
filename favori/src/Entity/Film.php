<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $Titre;

    #[ORM\Column(type: 'integer')]
    private $Duree;

    #[ORM\Column(type: 'date')]
    private $Annee_de_sortie;

    #[ORM\ManyToOne(targetEntity: Realisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_realisateur;

    public function getIdFilm(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(int $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getAnneeDeSortie(): ?\DateTimeInterface
    {
        return $this->Annee_de_sortie;
    }

    public function setAnneeDeSortie(\DateTimeInterface $Annee_de_sortie): self
    {
        $this->Annee_de_sortie = $Annee_de_sortie;

        return $this;
    }

    public function getIdRealisateur(): ?Realisateur
    {
        return $this->id_realisateur;
    }

    public function setIdRealisateur(?Realisateur $id_realisateur): self
    {
        $this->id_realisateur = $id_realisateur;

        return $this;
    }
}
