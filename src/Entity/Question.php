<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="formation_id", type="integer", nullable=false)
     */
    private $formationId;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=255, nullable=false)
     */
    private $question;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Examen", mappedBy="question")
     */
    private $examen;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->examen = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormationId(): ?int
    {
        return $this->formationId;
    }

    public function setFormationId(int $formationId): self
    {
        $this->formationId = $formationId;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection|Examen[]
     */
    public function getExamen(): Collection
    {
        return $this->examen;
    }

    public function addExaman(Examen $examan): self
    {
        if (!$this->examen->contains($examan)) {
            $this->examen[] = $examan;
            $examan->addQuestion($this);
        }

        return $this;
    }

    public function removeExaman(Examen $examan): self
    {
        if ($this->examen->removeElement($examan)) {
            $examan->removeQuestion($this);
        }

        return $this;
    }

}
