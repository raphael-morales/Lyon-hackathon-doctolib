<?php

namespace App\Entity;

use App\Repository\BodySublocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BodySublocationRepository::class)
 */
class BodySublocation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $API_Id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=BodyLocation::class, inversedBy="bodySublocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bodyLocation;

    /**
     * @ORM\OneToMany(targetEntity=Symptom::class, mappedBy="bodySublocation")
     */
    private $symptoms;

    public function __construct()
    {
        $this->symptoms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAPIId(): ?int
    {
        return $this->API_Id;
    }

    public function setAPIId(int $API_Id): self
    {
        $this->API_Id = $API_Id;

        return $this;
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

    public function getBodyLocation(): ?BodyLocation
    {
        return $this->bodyLocation;
    }

    public function setBodyLocation(?BodyLocation $bodyLocation): self
    {
        $this->bodyLocation = $bodyLocation;

        return $this;
    }

    /**
     * @return Collection|Symptom[]
     */
    public function getSymptoms(): Collection
    {
        return $this->symptoms;
    }

    public function addSymptom(Symptom $symptom): self
    {
        if (!$this->symptoms->contains($symptom)) {
            $this->symptoms[] = $symptom;
            $symptom->setBodySublocation($this);
        }

        return $this;
    }

    public function removeSymptom(Symptom $symptom): self
    {
        if ($this->symptoms->contains($symptom)) {
            $this->symptoms->removeElement($symptom);
            // set the owning side to null (unless already changed)
            if ($symptom->getBodySublocation() === $this) {
                $symptom->setBodySublocation(null);
            }
        }

        return $this;
    }
}
