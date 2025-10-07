<?php
// src/Manager/OrdenManager.php
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

        $orden = $this->obtenerOrden($usuario);

        $item = new Item();
        $item->setProducto($producto);
        $item->setCantidad($cantidad);
        $item->setOrden($orden);

        $orden->addItem($item);

        if ($orden->getEstado() === null) {
            $orden->setEstado('pendiente');
            $orden->setIniciada(new \DateTime());
        }

        $this->em->persist($item);
        $this->em->persist($orden);
        $this->em->flush();
    }

    private function obtenerOrden(Usuario $usuario): Orden
    {
        $orden = $this->ordenRepository->findOneBy([
            'usuario' => $usuario,
            'estado' => 'pendiente'
        ]);

        if (!$orden) {
            $orden = new Orden();
            $orden->setUsuario($usuario);
            $orden->setEstado('pendiente');
            $orden->setIniciada(new \DateTime());
            $this->em->persist($orden);
            $this->em->flush();
        }

        return $orden;
    }
}
?>