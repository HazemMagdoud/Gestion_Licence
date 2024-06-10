<?php

namespace App\Entity;

use App\Repository\PackageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackageRepository::class)]
class Package
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $est_activation_auto = null;

    #[ORM\Column]
    private ?bool $est_rappel_auto = null;

    #[ORM\Column]
    private ?bool $est_publier_site = null;

    #[ORM\Column]
    private ?float $prix_annuel = null;

    #[ORM\Column]
    private ?float $prix_mensuel = null;

    #[ORM\Column]
    private ?float $cout_utilisateur_supp = null;

    #[ORM\Column]
    private ?bool $est_prelevemnt_auto = null;

    #[ORM\Column]
    private ?int $nb_jours_echeance = null;

    #[ORM\Column]
    private ?bool $est_actif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isEstActivationAuto(): ?bool
    {
        return $this->est_activation_auto;
    }

    public function setEstActivationAuto(bool $est_activation_auto): static
    {
        $this->est_activation_auto = $est_activation_auto;

        return $this;
    }

    public function isEstRappelAuto(): ?bool
    {
        return $this->est_rappel_auto;
    }

    public function setEstRappelAuto(bool $est_rappel_auto): static
    {
        $this->est_rappel_auto = $est_rappel_auto;

        return $this;
    }

    public function isEstPublierSite(): ?bool
    {
        return $this->est_publier_site;
    }

    public function setEstPublierSite(bool $est_publier_site): static
    {
        $this->est_publier_site = $est_publier_site;

        return $this;
    }

    public function getPrixAnnuel(): ?float
    {
        return $this->prix_annuel;
    }

    public function setPrixAnnuel(float $prix_annuel): static
    {
        $this->prix_annuel = $prix_annuel;

        return $this;
    }

    public function getPrixMensuel(): ?float
    {
        return $this->prix_mensuel;
    }

    public function setPrixMensuel(float $prix_mensuel): static
    {
        $this->prix_mensuel = $prix_mensuel;

        return $this;
    }

    public function getCoutUtilisateurSupp(): ?float
    {
        return $this->cout_utilisateur_supp;
    }

    public function setCoutUtilisateurSupp(float $cout_utilisateur_supp): static
    {
        $this->cout_utilisateur_supp = $cout_utilisateur_supp;

        return $this;
    }

    public function isEstPrelevemntAuto(): ?bool
    {
        return $this->est_prelevemnt_auto;
    }

    public function setEstPrelevemntAuto(bool $est_prelevemnt_auto): static
    {
        $this->est_prelevemnt_auto = $est_prelevemnt_auto;

        return $this;
    }

    public function getNbJoursEcheance(): ?int
    {
        return $this->nb_jours_echeance;
    }

    public function setNbJoursEcheance(int $nb_jours_echeance): static
    {
        $this->nb_jours_echeance = $nb_jours_echeance;

        return $this;
    }

    public function isEstActif(): ?bool
    {
        return $this->est_actif;
    }

    public function setEstActif(bool $est_actif): static
    {
        $this->est_actif = $est_actif;

        return $this;
    }
}
