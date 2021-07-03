<?php

namespace App\Entity;

use App\Repository\TicketsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketsRepository::class)
 */
class Tickets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $tag;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end;

    /**
     * @ORM\OneToMany(targetEntity=Projects::class, mappedBy="tickets")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="tickets")
     */
    private $user;

    public function __construct()
    {
        $this->project = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTag(): ?int
    {
        return $this->tag;
    }

    public function setTag(int $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    /**
     * @return Collection|Projects[]
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(Projects $project): self
    {
        if (!$this->project->contains($project)) {
            $this->project[] = $project;
            $project->setTickets($this);
        }

        return $this;
    }

    public function removeProject(Projects $project): self
    {
        if ($this->project->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getTickets() === $this) {
                $project->setTickets(null);
            }
        }

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }
    
}
