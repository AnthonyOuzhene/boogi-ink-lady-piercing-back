<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 * @ApiResource
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $main_picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $realisation_date;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="galleries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activity_name;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="galleries")
     */
    private $category_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMainPicture(): ?string
    {
        return $this->main_picture;
    }

    public function setMainPicture(string $main_picture): self
    {
        $this->main_picture = $main_picture;

        return $this;
    }

    public function getPicture1(): ?string
    {
        return $this->picture1;
    }

    public function setPicture1(?string $picture1): self
    {
        $this->picture1 = $picture1;

        return $this;
    }

    public function getPicture2(): ?string
    {
        return $this->picture2;
    }

    public function setPicture2(?string $picture2): self
    {
        $this->picture2 = $picture2;

        return $this;
    }

    public function getPicture3(): ?string
    {
        return $this->picture3;
    }

    public function setPicture3(?string $picture3): self
    {
        $this->picture3 = $picture3;

        return $this;
    }

    public function getPicture4(): ?string
    {
        return $this->picture4;
    }

    public function setPicture4(?string $picture4): self
    {
        $this->picture4 = $picture4;

        return $this;
    }

    public function getPicture5(): ?string
    {
        return $this->picture5;
    }

    public function setPicture5(?string $picture5): self
    {
        $this->picture5 = $picture5;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getRealisationDate(): ?\DateTimeInterface
    {
        return $this->realisation_date;
    }

    public function setRealisationDate(?\DateTimeInterface $realisation_date): self
    {
        $this->realisation_date = $realisation_date;

        return $this;
    }

    public function getActivityName(): ?Activity
    {
        return $this->activity_name;
    }

    public function setActivityName(?Activity $activity_name): self
    {
        $this->activity_name = $activity_name;

        return $this;
    }

    public function getCategoryName(): ?Category
    {
        return $this->category_name;
    }

    public function setCategoryName(?Category $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }
}
