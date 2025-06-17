<?php

namespace App\Entity;

use App\Enum\EtatType;
use App\Enum\IncidentType;
use App\Repository\SignalementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
#[ApiResource]
#[ORM\Table(name: 'signalements')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USER_ID', fields: ['user_id'])]
#[ORM\Entity(repositoryClass: SignalementsRepository::class)]
class Signalements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(enumType: IncidentType::class)]
    private ?IncidentType $tags = null;

    #[ORM\Column(enumType: EtatType::class)]
    private ?EtatType $etat = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'latitude')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $longitude = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTags(): ?IncidentType
    {
        return $this->tags;
    }

    public function setTags(IncidentType $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getEtat(): ?EtatType
    {
        return $this->etat;
    }

    public function setEtat(EtatType $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }
}
