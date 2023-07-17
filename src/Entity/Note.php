<?php

namespace App\Entity;


use ApiPlatform\Metadata\ApiResource;
use App\Repository\NoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: NoteRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $review = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attachmentLink = null;

    #[ORM\ManyToOne(inversedBy: 'notes', fetch:'EAGER')] //Fetch eager signifie qu'il fera un INNER JOIN avec la table student
    #[ORM\JoinColumn(nullable: false)]
    private ?Student $student = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): static
    {
        $this->review = $review;

        return $this;
    }

    public function getAttachmentLink(): ?string
    {
        return $this->attachmentLink;
    }

    public function setAttachmentLink(?string $attachmentLink): static
    {
        $this->attachmentLink = $attachmentLink;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Méthode qui sera lancée avant un persist sur l'entité, on s'en sert ici pour lui assigner une date de
     * création par défaut. Nécessite l'annotation HasLifecycleCallbacks déclarée sur l'entité en haut
     */
    #[ORM\PrePersist]
    public function prePersist() {
        $this->createdAt = new \DateTime();
    }
}
