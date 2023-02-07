<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'indexImageFile', fileNameProperty: 'indexImageName', size: 'indexImageSize')]
    private ?File $indexImageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $indexImageName = null;

    #[ORM\Column]
    private ?int $indexImageSize = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param File|null $indexImageFile
     */
    public function setImageFile(?File $indexImageFile = null): void
    {
        $this->indexImageFile = $indexImageFile;
    }

    public function getImageFile(): ?File
    {
        return $this->indexImageFile;
    }

    public function getIndexImageName(): ?string
    {
        return $this->indexImageName;
    }

    public function setIndexImageName(string $indexImageName): self
    {
        $this->indexImageName = $indexImageName;

        return $this;
    }

    public function getIndexImageSize(): ?int
    {
        return $this->indexImageSize;
    }

    public function setIndexImageSize(int $indexImageSize): self
    {
        $this->indexImageSize = $indexImageSize;

        return $this;
    }
}
