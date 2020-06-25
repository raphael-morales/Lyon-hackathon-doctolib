<?php

namespace App\Entity;

use App\Repository\SymptomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SymptomRepository::class)
 */
class Symptom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $API_Id;

    /**
     * @ORM\ManyToOne(targetEntity=BodySublocation::class, inversedBy="symptoms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bodySublocation;

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

    public function getAPIId(): ?int
    {
        return $this->API_Id;
    }

    public function setAPIId(int $API_Id): self
    {
        $this->API_Id = $API_Id;

        return $this;
    }

    public function getBodySublocation(): ?BodySublocation
    {
        return $this->bodySublocation;
    }

    public function setBodySublocation(?BodySublocation $bodySublocation): self
    {
        $this->bodySublocation = $bodySublocation;

        return $this;
    }
}
