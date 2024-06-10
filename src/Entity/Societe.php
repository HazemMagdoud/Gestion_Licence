<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
#[ApiResource()]
class Societe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $DenominationSociale = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $SIRET_Number = null;

    #[ORM\Column]
    private ?int $Code_APE_NAF = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $domaineActivite = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $codePostale = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 20)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $formJuridique = null;

    #[ORM\Column]
    private ?float $capital = null;

    #[ORM\Column(length: 20)]
    private ?string $numRCS = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieuImmat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $categorie = null;

    #[ORM\Column(length: 20)]
    private ?string $numTVA = null;

    #[ORM\Column(length: 3)]
    private ?string $Devise = null;

    #[ORM\Column(length: 255)]
    private ?string $pack = null;

    #[ORM\Column]
    private ?int $nb_user = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'nomSociete')]
    private Collection $Client;

    public function __construct()
    {
        $this->Client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDenominationSociale(): ?string
    {
        return $this->DenominationSociale;
    }

    public function setDenominationSociale(string $DenominationSociale): static
    {
        $this->DenominationSociale = $DenominationSociale;

        return $this;
    }

    public function getSIRETNumber(): ?string
    {
        return $this->SIRET_Number;
    }

    public function setSIRETNumber(string $SIRET_Number): static
    {
        $this->SIRET_Number = $SIRET_Number;

        return $this;
    }

    public function getCodeAPENAF(): ?int
    {
        return $this->Code_APE_NAF;
    }

    public function setCodeAPENAF(int $Code_APE_NAF): static
    {
        $this->Code_APE_NAF = $Code_APE_NAF;

        return $this;
    }

    public function getDomaineActivite(): ?string
    {
        return $this->domaineActivite;
    }

    public function setDomaineActivite(?string $domaineActivite): static
    {
        $this->domaineActivite = $domaineActivite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostale(): ?int
    {
        return $this->codePostale;
    }

    public function setCodePostale(int $codePostale): static
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFormJuridique(): ?string
    {
        return $this->formJuridique;
    }

    public function setFormJuridique(?string $formJuridique): static
    {
        $this->formJuridique = $formJuridique;

        return $this;
    }

    public function getCapital(): ?float
    {
        return $this->capital;
    }

    public function setCapital(float $capital): static
    {
        $this->capital = $capital;

        return $this;
    }

    public function getNumRCS(): ?string
    {
        return $this->numRCS;
    }

    public function setNumRCS(string $numRCS): static
    {
        $this->numRCS = $numRCS;

        return $this;
    }

    public function getLieuImmat(): ?string
    {
        return $this->lieuImmat;
    }

    public function setLieuImmat(?string $lieuImmat): static
    {
        $this->lieuImmat = $lieuImmat;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNumTVA(): ?string
    {
        return $this->numTVA;
    }

    public function setNumTVA(string $numTVA): static
    {
        $this->numTVA = $numTVA;

        return $this;
    }

    public function getDevise(): ?string
    {
        return $this->Devise;
    }

    public function setDevise(string $Devise): static
    {
        $this->Devise = $Devise;

        return $this;
    }

    public function getPack(): ?string
    {
        return $this->pack;
    }

    public function setPack(string $pack): static
    {
        $this->pack = $pack;

        return $this;
    }

    public function getNbUser(): ?int
    {
        return $this->nb_user;
    }

    public function setNbUser(int $nb_user): static
    {
        $this->nb_user = $nb_user;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClient(): Collection
    {
        return $this->Client;
    }

    public function addClient(Client $client): static
    {
        if (!$this->Client->contains($client)) {
            $this->Client->add($client);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        $this->Client->removeElement($client);

        return $this;
    }
}
