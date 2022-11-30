<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reclamation $reclamation = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_ag = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_ag = null;

    #[ORM\Column(length: 255)]
    private ?string $traitement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReclamation(): ?Reclamation
    {
        return $this->reclamation;
    }

    public function setReclamation(?Reclamation $reclamation): self
    {
        $this->reclamation = $reclamation;

        return $this;
    }

    public function getNomAg(): ?string
    {
        return $this->nom_ag;
    }

    public function setNomAg(string $nom_ag): self
    {
        $this->nom_ag = $nom_ag;

        return $this;
    }

    public function getPrenomAg(): ?string
    {
        return $this->prenom_ag;
    }

    public function setPrenomAg(string $prenom_ag): self
    {
        $this->prenom_ag = $prenom_ag;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }
}
