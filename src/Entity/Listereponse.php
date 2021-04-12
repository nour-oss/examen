<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listereponse
 *
 * @ORM\Table(name="listereponse", indexes={@ORM\Index(name="idReponse", columns={"idReponse"}), @ORM\Index(name="idQuestion", columns={"idQuestion"})})
 * @ORM\Entity
 */
class Listereponse
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
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\Column(name="idQuestion", type="integer", nullable=false)
     */
    private $idquestion;

    /**
     * @var int
     *
     * @ORM\Column(name="idReponse", type="integer", nullable=false)
     */
    private $idreponse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
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

    public function getIdreponse(): ?int
    {
        return $this->idreponse;
    }

    public function setIdreponse(int $idreponse): self
    {
        $this->idreponse = $idreponse;

        return $this;
    }


}
