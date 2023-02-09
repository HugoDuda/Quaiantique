<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?DateTimeInterface $hours = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeInterface $day = null;

    #[ORM\Column]
    private ?int $guestNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Allergy = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?User $bookings = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHours(): ?DateTimeInterface
    {
        return $this->hours;
    }

    public function setHours(?DateTimeInterface $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    public function getDay(): ?DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(?DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getGuestNumber(): ?int
    {
        return $this->guestNumber;
    }

    public function setGuestNumber(?int $guestNumber): self
    {
        $this->guestNumber = $guestNumber;

        return $this;
    }

    public function getAllergy(): ?string
    {
        return $this->Allergy;
    }

    public function setAllergy(?string $Allergy): self
    {
        $this->Allergy = $Allergy;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBookings(): ?User
    {
        return $this->bookings;
    }

    public function setBookings(?User $bookings): self
    {
        $this->bookings = $bookings;

        return $this;
    }
}
