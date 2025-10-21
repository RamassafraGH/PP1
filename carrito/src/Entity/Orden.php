<?php

namespace App\Entity;

use App\Repository\OrdenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdenRepository::class)]
class Orden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $estado = null;

    #[ORM\Column]
    private ?\DateTime $iniciada = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $confirmada = null;

    /**
     * @var Collection<int, Item>
     */
    #[ORM\OneToMany(targetEntity: Item::class, mappedBy: 'orden')]
    private Collection $item;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $usuario = null;

    public function __construct()
    {
        $this->item = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIniciada(): ?\DateTime
    {
        return $this->iniciada;
    }

    public function setIniciada(\DateTime $iniciada): static
    {
        $this->iniciada = $iniciada;

        return $this;
    }

    public function getConfirmada(): ?\DateTime
    {
        return $this->confirmada;
    }

    public function setConfirmada(?\DateTime $confirmada): static
    {
        $this->confirmada = $confirmada;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(Item $item): Item
    {
        foreach ($this->item as $existente) {
            if ($existente->getProducto()->getId() === $item->getProducto()->getId()) {
                $existente->setCantidad($existente->getCantidad() + $item->getCantidad());
                return $existente;
            }
        }
    
        $this->item->add($item);
        $item->setOrden($this);
    
        return $item;
    }
    

public function removeItem(Item $item): void
{
    if ($this->items->contains($item)) {
        $this->items->removeElement($item);
        $item->setOrden(null);
    }
}


    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }


    public function getTotal(): float {
        $total = 0;
        foreach ($this->item as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }
    
}
