<?php

namespace App\Entity;

use App\Repository\PartageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartageRepository::class)]
class Partage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'partages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Note $note = null;

    #[ORM\Column]
    private ?\DateTime $datePartage = null;

    #[ORM\Column]
    private ?bool $droitAcces = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?Note
    {
        return $this->note;
    }

    public function setNote(?Note $note): static
    {
        $this->note = $note;

        return $this;
    }



    public function getDatePartage(): ?\DateTime
    {
        return $this->datePartage;
    }

    public function setDatePartage(\DateTime $datePartage): static
    {
        $this->datePartage = $datePartage;

        return $this;
    }

    public function isDroitAcces(): ?bool
    {
        return $this->droitAcces;
    }

    public function setDroitAcces(bool $droitAcces): static
    {
        $this->droitAcces = $droitAcces;

        return $this;
    }
}
