<?php

namespace App\Entity;

use App\Enum\EtatType;
use App\Enum\IncidentType;
use App\Repository\SignalementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use App\Entity\Evenements;

#[ApiResource]
#[ORM\Table(
    name: 'signalements',
)]
#[ORM\Entity(repositoryClass: SignalementsRepository::class)]
#[ApiFilter(SearchFilter::class, properties: ['titre'=> 'partial', 'user.email' => 'exact', 'etat' => 'exact', 'tags' => 'exact'])]
#[Post(security: 'is_granted("ROLE_USER")')]
#[GetCollection]
#[Get]
#[Put(security: 'is_granted("ROLE_USER")')]
#[Patch(security: 'is_granted("ROLE_USER")')]
#[Delete(security: 'is_granted("ROLE_ADMIN")')]
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

    #[ORM\ManyToOne(inversedBy: 'signalements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $longitude = null;


    #[ORM\Column(type:Types::TEXT, nullable: true)]
    private $image;
    /**
     * @var Collection<int, Evenements>
     */
    #[ORM\OneToMany(targetEntity: Evenements::class, mappedBy: 'signalement')]
    private Collection $evenements;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
    }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
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
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Collection<int, Evenements>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenements $evenement): static
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
            $evenement->setSignalementId($this);
        }

        return $this;
    }

    public function removeEvenement(Evenements $evenement): static
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getSignalementId() === $this) {
                $evenement->setSignalementId(null);
            }
        }

        return $this;
    }
}
