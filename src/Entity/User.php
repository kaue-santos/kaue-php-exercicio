<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
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
     * @ORM\Column(type="string", length=30)
     */
    private $Nome;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DataNascimento;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Email;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $ListaTelefones = [];

    /**
     * @ORM\OneToMany(targetEntity=Telefone::class, mappedBy="UserUser")
     */
    private $IDtelefones;

    public function __construct()
    {
        $this->IDtelefones = new ArrayCollection();
    }

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

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(string $Nome): self
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->DataNascimento;
    }

    public function setDataNascimento(?\DateTimeInterface $DataNascimento): self
    {
        $this->DataNascimento = $DataNascimento;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getListaTelefones(): ?array
    {
        return $this->ListaTelefones;
    }

    public function setListaTelefones(?array $ListaTelefones): self
    {
        $this->ListaTelefones = $ListaTelefones;

        return $this;
    }

    /**
     * @return Collection<int, Telefone>
     */
    public function getIDtelefones(): Collection
    {
        return $this->IDtelefones;
    }

    public function addIDtelefone(Telefone $iDtelefone): self
    {
        if (!$this->IDtelefones->contains($iDtelefone)) {
            $this->IDtelefones[] = $iDtelefone;
            $iDtelefone->setUserUser($this);
            #$iDtelefone->setNumero();
            #$iDtelefone->setDDD()
            ;
        }

        return $this;
    }

    public function removeIDtelefone(Telefone $iDtelefone): self
    {
        if ($this->IDtelefones->removeElement($iDtelefone)) {
            // set the owning side to null (unless already changed)
            if ($iDtelefone->getUserUser() === $this) {
                $iDtelefone->setUserUser(null);
            }
        }

        return $this;
    }
    
}
