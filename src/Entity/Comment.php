<?php 

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\SerializedName;

//@Groups({"comment:read", "comment:write"})
/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"comment:read", "comments"}},
 *     denormalizationContext={"groups"={"comment:write", "comments"}}
 * ),
 * @ApiFilter(DateFilter::class, properties={"dateTime"})
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"comment:read", "comment:write"})
     */
    private $projectName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"comment:read", "comment:write"})
     * 
     */
    private $realisation_date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"comment:read", "comment:write"})
     * 
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"comment:read", "comment:write"})
     * 
     */
    private $message;

    /**
     * @ORM\Column(type="date")
     * @Groups({"comment:read", "comment:write"})
     * 
     * 
     */
    private $commentDate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"comment:read", "comment:write"})
     * 
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="comments"), 
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"comment:read", "comment:write"})
     * 
     * 
     */
    private $activityName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    public function setProjectName(?string $projectName): self
    {
        $this->projectName = $projectName;

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
        return $this->commentDate;
    }

    public function setCommentDate(\DateTimeInterface $commentDate): self
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getActivityName(): ?Activity
    {
        return $this->activityName;
    }

    public function setActivityName(?Activity $activityName): self
    {
        $this->activityName = $activityName;

        return $this;
    }
}
