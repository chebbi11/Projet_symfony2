<?php

namespace App\Entity;
use App\Repository\ReservationEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass:ReservationEvenementRepository::class)]
class ReservationEvenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idReservationEvenement;

    #[ORM\Column]
    private ?int $nbPlace=null;

    #[ORM\Column]
    private ?int $totale=null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]

    private ?string $modePaiement= null;

    #[ORM\Column]
    private ? int $idUser=null;
    #[ORM\Column(name:'id_event')]
    #[ORM\ManyToOne( targetEntity: Evenement::class ,inversedBy:'Reservations')]
    private $evenement ;

    public function getIdReservationEvenement(): ?int
    {
        return $this->idReservationEvenement;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): self
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function getTotale(): ?int
    {
        return $this->totale;
    }

    public function setTotale(int $totale): self
    {
        $this->totale = $totale;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): self
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


    public function getEvenement() : ?int
    {
        return $this->evenement;
    }


    public function setEvenement($evenement): self
    {
        $this->evenement = $evenement;
        return $this;
    }




}
