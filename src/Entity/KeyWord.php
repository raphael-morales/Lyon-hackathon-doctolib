<?php

namespace App\Entity;

use App\Repository\KeyWordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeyWordRepository::class)
 */
class KeyWord
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
    private $Word;

    /**
     * @ORM\ManyToOne(targetEntity=BotQuestion::class, inversedBy="keyWords")
     * @ORM\JoinColumn(nullable=false)
     */
    private $botQuestion;

    /**
     * @ORM\OneToMany(targetEntity=Symptom::class, mappedBy="keyword")
     */
    private $symptoms;

    public function __construct()
    {
        $this->specialities = new ArrayCollection();
        $this->symptoms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWord(): ?string
    {
        return $this->Word;
    }

    public function setWord(string $Word): self
    {
        $this->Word = $Word;

        return $this;
    }

    public function getBotQuestion(): ?BotQuestion
    {
        return $this->botQuestion;
    }

    public function setBotQuestion(?BotQuestion $botQuestion): self
    {
        $this->botQuestion = $botQuestion;

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
            $symptom->setKeyword($this);
        }

        return $this;
    }

    public function removeSymptom(Symptom $symptom): self
    {
        if ($this->symptoms->contains($symptom)) {
            $this->symptoms->removeElement($symptom);
            // set the owning side to null (unless already changed)
            if ($symptom->getKeyword() === $this) {
                $symptom->setKeyword(null);
            }
        }

        return $this;
    }
}
