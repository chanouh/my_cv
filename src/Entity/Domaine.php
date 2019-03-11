<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\DomaineRepository")
 */
class Domaine
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
    private $nameDomaine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDomaine(): ?string
    {
        return $this->nameDomaine;
    }

    public function setNameDomaine(string $nameDomaine): self
    {
        $this->nameDomaine = $nameDomaine;

        return $this;
    }
}
