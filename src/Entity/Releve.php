<?php

namespace App\Entity;

use App\Repository\ReleveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReleveRepository::class)]
class Releve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\ManyToOne(inversedBy: 'releves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lieu $Lieu = null;

    #[ORM\Column(length: 255)]
    private ?string $ReleveBrut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getLieu(): ?Lieu
    {
        return $this->Lieu;
    }

    public function setLieu(?Lieu $Lieu): static
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getReleveBrut(): ?string
    {
        return $this->ReleveBrut;
    }

    public function setReleveBrut(string $ReleveBrut): static
    {
        $this->ReleveBrut = $ReleveBrut;

        return $this;
    }
}
