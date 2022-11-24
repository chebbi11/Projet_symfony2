<?php

namespace App\Entity;
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idEvent ;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]
    private ?string $categorie = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your name cannot contain a number',
    )]
    private ?string $titre= null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]
    private ?string  $description= null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]
    private ?string $lieu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEvent= null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]
    private ?string $image = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 1000,
        notInRangeMessage: 'Tu doit saisir une valeur entre {{ min }} et {{ max }}',
    )]    private ?int $tarif= null;

    #[ORM\Column]
    #[Assert\Range(
        min: 5,
        max: 500,
        notInRangeMessage: 'Tu doit saisir une valeur entre {{ min }} et {{ max }}',
    )]    private ?int $capacite= null;

    #[ORM\Column]
    private ?int $nbReservation= null;

    #[ORM\Column(length: 255)]
    private ?string $etat= null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:'cette champs doit etre remplis')]
    private ?string $pour=null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAjout = null;
#[ORM\OneToMany(mappedBy: 'evenement', targetEntity: ReservationEvenement::class)]
private Collection $Reservations;

public function __construct()
{
    $this->Reservations = new ArrayCollection();
}

public function getIdEvent(): ?int
{
    return $this->idEvent;
}

public function getCategorie(): ?string
{
    return $this->categorie;
}

public function setCategorie(string $categorie): self
{
    $this->categorie = $categorie;

    return $this;
}

public function getTitre(): ?string
{
    return $this->titre;
}

public function setTitre(string $titre): self
{
    $this->titre = $titre;

    return $this;
}

public function getDescription(): ?string
{
    return $this->description;
}

public function setDescription(string $description): self
{
    $this->description = $description;

    return $this;
}

public function getLieu(): ?string
{
    return $this->lieu;
}

public function setLieu(string $lieu): self
{
    $this->lieu = $lieu;

    return $this;
}

public function getDateEvent(): ?\DateTimeInterface
{
    return $this->dateEvent;
}

public function setDateEvent(\DateTimeInterface $dateEvent): self
{
    $this->dateEvent = $dateEvent;

    return $this;
}

    public function getImage()
    {
        return $this->image;
    }


    public function setImage(string $image)
    {
        $this->image = $image;
        return $this;

    }

public function getTarif(): ?int
{
    return $this->tarif;
}

public function setTarif(int $tarif): self
{
    $this->tarif = $tarif;

    return $this;
}

public function getCapacite(): ?int
{
    return $this->capacite;
}

public function setCapacite(int $capacite): self
{
    $this->capacite = $capacite;

    return $this;
}

public function getNbReservation(): ?int
{
    return $this->nbReservation;
}

public function setNbReservation(int $nbReservation): self
{
    $this->nbReservation = $nbReservation;

    return $this;
}

public function getEtat(): ?string
{
    return $this->etat;
}

public function setEtat(string $etat): self
{
    $this->etat = $etat;

    return $this;
}

public function getPour(): ?string
{
    return $this->pour;
}

public function setPour(string $pour): self
{
    $this->pour = $pour;

    return $this;
}

public function getDateAjout(): ?\DateTimeInterface
{
    return $this->dateAjout;
}

public function setDateAjout(\DateTimeInterface $dateAjout): self
{
    $this->dateAjout = $dateAjout;

    return $this;
}

/**
 * @return Collection<int, ReservationEvenement>
 */
public function getReservations(): Collection
{
    return $this->Reservations;
}

public function addReservation(ReservationEvenement $reservation): self
{
    if (!$this->Reservations->contains($reservation)) {
        $this->Reservations->add($reservation);
        $reservation->setEvenement($this);
    }

    return $this;
}

public function removeReservation(ReservationEvenement $reservation): self
{
    if ($this->Reservations->removeElement($reservation)) {
        // set the owning side to null (unless already changed)
        if ($reservation->getEvenement() === $this) {
            $reservation->setEvenement(null);
        }
    }

    return $this;
}
}
