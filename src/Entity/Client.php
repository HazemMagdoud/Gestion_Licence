<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource()]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $modePaiement = null;

    #[ORM\Column]
    private ?int $nbSociete = null;

    /**
     * @var Collection<int, Societe>
     */
    #[ORM\ManyToMany(targetEntity: Societe::class, mappedBy: 'Client')]
    private Collection $nomSociete;

    public function __construct()
    {
        $this->nomSociete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): static
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getNbSociete(): ?int
    {
        return $this->nbSociete;
    }

    public function setNbSociete(int $nbSociete): static
    {
        $this->nbSociete = $nbSociete;

        return $this;
    }

    /**
     * @return Collection<int, Societe>
     */
    public function getNomSociete(): Collection
    {
        return $this->nomSociete;
    }

    public function addNomSociete(Societe $nomSociete): static
    {
        if (!$this->nomSociete->contains($nomSociete)) {
            $this->nomSociete->add($nomSociete);
            $nomSociete->addClient($this);
        }

        return $this;
    }

    public function removeNomSociete(Societe $nomSociete): static
    {
        if ($this->nomSociete->removeElement($nomSociete)) {
            $nomSociete->removeClient($this);
        }

        return $this;
    }
}
