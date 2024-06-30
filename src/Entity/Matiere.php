<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
class Matiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    /**
     * @var Collection<int, certification>
     */
    #[ORM\OneToMany(targetEntity: certification::class, mappedBy: 'matiere')]
    private Collection $certification;

    public function __construct()
    {
        $this->certification = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getNom();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, certification>
     */
    public function getCertification(): Collection
    {
        return $this->certification;
    }

    public function addCertification(certification $certification): static
    {
        if (!$this->certification->contains($certification)) {
            $this->certification->add($certification);
            $certification->setMatiere($this);
        }

        return $this;
    }

    public function removeCertification(certification $certification): static
    {
        if ($this->certification->removeElement($certification)) {
            // set the owning side to null (unless already changed)
            if ($certification->getMatiere() === $this) {
                $certification->setMatiere(null);
            }
        }

        return $this;
    }
}
