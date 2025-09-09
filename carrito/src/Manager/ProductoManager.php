<?php

namespace App\Manager;

use App\Repository\ProductoRepository;
use App\Entity\Producto;

class ProductoManager
{
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function getProductos(): array
    {
        return $this->productoRepository->findAll();
    }

    public function getProducto(int $id): ?Producto
    {
        return $this->productoRepository->find($id);
    }
}
