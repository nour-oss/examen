<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examenquestion
 *
 * @ORM\Table(name="examenquestion", indexes={@ORM\Index(name="idQuestion", columns={"idQuestion"}), @ORM\Index(name="idExamen", columns={"idExamen"})})
 * @ORM\Entity
 */
class Examenquestion
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
     * @ORM\Column(name="idQuestion", type="integer", nullable=false)
     */
    private $idquestion;

    /**
     * @var int
     *
     * @ORM\Column(name="idExamen", type="integer", nullable=false)
     */
    private $idexamen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdquestion(): ?int
    {
        return $this->idquestion;
    }

    public function setIdquestion(int $idquestion): self
    {
        $this->idquestion = $idquestion;

        return $this;
    }

    public function getIdexamen(): ?int
    {
        return $this->idexamen;
    }

    public function setIdexamen(int $idexamen): self
    {
        $this->idexamen = $idexamen;

        return $this;
    }


}
