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
        // Validar cantidad
        if ($cantidad <= 0) {
            throw new \InvalidArgumentException("La cantidad debe ser mayor a 0");
        }

        // Obtener producto
        $producto = $this->productoRepository->find($idProducto);
        if (!$producto) {
            throw new \Exception("Producto no encontrado");
        }

        // Obtener o crear orden
        $orden = $this->obtenerOrden($usuario);

        // Crear nuevo ítem
        $item = new Item();
        $item->setProducto($producto);
        $item->setCantidad($cantidad);
        $item->setOrden($orden);

        // Agregar ítem a la orden
        $orden->addItem($item);

        // Setear estado si es nueva
        if ($orden->getEstado() === null) {
            $orden->setEstado('pendiente');
            $orden->setIniciada(new \DateTime());
        }

        // Persistir
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