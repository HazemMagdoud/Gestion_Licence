<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Processor\UserProcessor;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource (operations: [
   new Post(
       uriTemplate: '/main/utilisateurs' ,
        openapiContext: [
            'summary' => 'Create user',
            'description' => 'Création d\'un utilisateur',
        ],
       denormalizationContext: ['groups' => ['USER_ADD']],
       processor: UserProcessor::class

  ),

    new GetCollection(
        uriTemplate: '/main/societe/utilisateurs',
        openapiContext: [
            'summary' => 'Get user list',
            'description' => '',
        ],
        normalizationContext: ['groups' => ['utilisateur_read:list']],denormalizationContext: ['groups' => ['utilisateur_read:list']]

    ),

])]
#[Post(processor: UserProcessor::class)]
#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['utilisateur_read:list'])]
    #
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Groups(['utilisateur_read:list'])]
    private ?string $email = null;

    #[ORM\Column]
    #[Groups(['utilisateur_read:list'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['utilisateur_read:list'])]
    private ?string $password = null;

    #[ORM\Column(length: 70)]
    #[Groups(['utilisateur_read:list'])]
    private ?string $nom = null;



    #[ORM\Column(length: 15, nullable: true)]
    #[Groups(['utilisateur_read:list'])]
    private ?string $telephone = null;


    #[ORM\Column(length: 15, nullable: true)]
    #[Groups(['utilisateur_read:list'])]
    private ?string $portable = null;




    public function getId(): ?int
    {
        return $this->id;
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


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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


    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }


    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(?string $portable): static
    {
        $this->portable = $portable;

        return $this;
    }




}
