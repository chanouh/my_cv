<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\LoisirRepository")
 */
class Loisir
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
    private $Nameloisir;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameloisir(): ?string
    {
        return $this->Nameloisir;
    }

    public function setNameloisir(string $Nameloisir): self
    {
        $this->Nameloisir = $Nameloisir;

        return $this;
    }
}
