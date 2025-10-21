<?php
namespace App\Manager;

use App\Entity\Orden;
use App\Entity\Producto;
use App\Entity\Item;
use App\Entity\Usuario;
use App\Repository\OrdenRepository;
use App\Repository\ProductoRepository;
use Doctrine\ORM\EntityManagerInterface;

class OrdenManager
{
    private EntityManagerInterface $em;
    private ProductoRepository $productoRepository;
    private OrdenRepository $ordenRepository;

    public function __construct(
        EntityManagerInterface $em,
        ProductoRepository $productoRepository,
        OrdenRepository $ordenRepository
    ) {
        $this->em = $em;
        $this->productoRepository = $productoRepository;
        $this->ordenRepository = $ordenRepository;
    }

    public function agregarProducto(int $idProducto, int $cantidad, Usuario $usuario): void
{
    if ($cantidad <= 0) {
        throw new \InvalidArgumentException("La cantidad debe ser mayor a 0");
    }

    $producto = $this->productoRepository->find($idProducto);
    if (!$producto) {
        throw new \Exception("Producto no encontrado");
    }

    $orden = $this->verOrden($usuario);

    foreach ($orden->getItem() as $itemExistente) {
        if ($itemExistente->getProducto()->getId() === $producto->getId()) {
            $itemExistente->setCantidad($itemExistente->getCantidad() + $cantidad);
            $this->em->persist($itemExistente);
            $this->em->flush();
            return;
        }
    }

    $item = new Item();
    $item->setProducto($producto);
    $item->setCantidad($cantidad);
    $item->setOrden($orden);

    $orden->addItem($item);
    $orden->setEstado('Iniciada');
    $orden->setIniciada(new \DateTime());
    $orden->setUsuario($usuario);

    $this->em->persist($item);
    $this->em->persist($orden);
    $this->em->flush();
}

    public function verOrden(Usuario $usuario): Orden
    {
        $orden = $this->ordenRepository->findOneBy([
            'usuario' => $usuario,
            'estado' => 'Iniciada'
        ]);

        if ($orden){
            return $orden;
        } else {
            return new Orden();

        }

    }


    public function finalizarCompra(Usuario $usuario): void
{
    $orden = $this->ordenRepository->findOneBy([
        'usuario' => $usuario,
        'estado' => 'Iniciada'
    ]);

    if (!$orden) {
        throw new \Exception("No hay una orden iniciada para finalizar.");
    }

    $orden->setEstado('Finalizada');
    $orden->setConfirmada(new \DateTime());

    $this->em->persist($orden);
    $this->em->flush();
}
}
