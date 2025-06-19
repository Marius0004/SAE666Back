<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\Entity\Signalements;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use App\Entity\User;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ApiResource]
#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
#[Post(security: 'is_granted("ROLE_USER")')]
#[ApiFilter(SearchFilter::class, properties: ['libelle' => 'partial', 'user.email' => 'exact', 'signalement.id' => 'exact'])]
#[GetCollection]
#[Get]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    private ?Signalements $signalement = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    private ?User $user = null;

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

    
    public function getSignalement(): ?Signalements
    {
        return $this->signalement;
    }

   
    public function setSignalement(?Signalements $signalement): static
    {
        $this->signalement = $signalement;
        return $this;
    }

  

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }
}
