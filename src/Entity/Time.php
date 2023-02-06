<?php

namespace App\Entity;

use App\Repository\TimeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeRepository::class)]
class Time
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $morningOpening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $morningClosing = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $eveningOpening = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $eveningClosing = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMorningOpening(): ?\DateTimeInterface
    {
        return $this->morningOpening;
    }

    public function setMorningOpening(\DateTimeInterface $morningOpening): self
    {
        $this->morningOpening = $morningOpening;

        return $this;
    }

    public function getMorningClosing(): ?\DateTimeInterface
    {
        return $this->morningClosing;
    }

    public function setMorningClosing(\DateTimeInterface $morningClosing): self
    {
        $this->morningClosing = $morningClosing;

        return $this;
    }

    public function getEveningOpening(): ?\DateTimeInterface
    {
        return $this->eveningOpening;
    }

    public function setEveningOpening(\DateTimeInterface $eveningOpening): self
    {
        $this->eveningOpening = $eveningOpening;

        return $this;
    }

    public function getEveningClosing(): ?\DateTimeInterface
    {
        return $this->eveningClosing;
    }

    public function setEveningClosing(\DateTimeInterface $eveningClosing): self
    {
        $this->eveningClosing = $eveningClosing;

        return $this;
    }
}
