<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Context;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ApiResource(
 *    normalizationContext={
 *      "groups"={"comments"}
 *   }, 
 * )
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("comments")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("comments")
     * 
     */
    private $project_name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("comments")
     * 
     */
    private $realisation_date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("comments")
     * 
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups("comments")
     * 
     */
    private $message;

    /**
     * @ORM\Column(type="date")
     * @Groups("comments")
     * @Context(normalizationContext={"datetime_format"="d-m-Y"})
     */
    private $comment_date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("comments")
     * @Context(normalizationContext={"datetime_format"="d-m-Y"})
     * 
     * 
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("comments")
     * 
     */
    private $activity_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->project_name;
    }

    public function setProjectName(?string $project_name): self
    {
        $this->project_name = $project_name;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCommentDate(): ?\DateTimeInterface
    {
        return $this->comment_date;
    }

    public function setCommentDate(\DateTimeInterface $comment_date): self
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

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
}
