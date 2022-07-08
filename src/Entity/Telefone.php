<?php

namespace App\Entity;

use App\Repository\TelefoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelefoneRepository::class)
 */
class Telefone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DataCriacao;

    /**
     * @ORM\Column(type="date")
     */
    private $DataAtualizacao;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $DDD;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $Numero;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="IDtelefones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataCriacao(): ?\DateTimeInterface
    {
        return $this->DataCriacao;
    }

    public function setDataCriacao(\DateTimeInterface $DataCriacao): self
    {
        $this->DataCriacao = $DataCriacao;

        return $this;
    }

    public function getDataAtualizacao(): ?\DateTimeInterface
    {
        return $this->DataAtualizacao;
    }

    public function setDataAtualizacao(\DateTimeInterface $DataAtualizacao): self
    {
        $this->DataAtualizacao = $DataAtualizacao;

        return $this;
    }

    public function getDDD(): ?string
    {
        return $this->DDD;
    }

    public function setDDD(string $DDD): self
    {
        $this->DDD = $DDD;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->Numero;
    }

    public function setNumero(string $Numero): self
    {
        $this->Numero = $Numero;

        return $this;
    }

    public function getUserUser(): ?User
    {
        return $this->UserUser;
    }

    public function setUserUser(?User $UserUser): self
    {
        $this->UserUser = $UserUser;

        return $this;
    }
}
