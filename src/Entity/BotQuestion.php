<?php

namespace App\Entity;

use App\Repository\BotQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BotQuestionRepository::class)
 */
class BotQuestion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Question;

    /**
     * @ORM\OneToMany(targetEntity=KeyWord::class, mappedBy="botQuestion")
     */
    private $keyWords;

    public function __construct()
    {
        $this->keyWords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->Question;
    }

    public function setQuestion(string $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    /**
     * @return Collection|KeyWord[]
     */
    public function getKeyWords(): Collection
    {
        return $this->keyWords;
    }

    public function addKeyWord(KeyWord $keyWord): self
    {
        if (!$this->keyWords->contains($keyWord)) {
            $this->keyWords[] = $keyWord;
            $keyWord->setBotQuestion($this);
        }

        return $this;
    }

    public function removeKeyWord(KeyWord $keyWord): self
    {
        if ($this->keyWords->contains($keyWord)) {
            $this->keyWords->removeElement($keyWord);
            // set the owning side to null (unless already changed)
            if ($keyWord->getBotQuestion() === $this) {
                $keyWord->setBotQuestion(null);
            }
        }

        return $this;
    }
}
