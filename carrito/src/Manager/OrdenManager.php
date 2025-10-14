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

        $orden = $this->verOrden($usuario);

        // Crear nuevo ítem
        $item = new Item();

        $item->setProducto($producto);
        $item->setCantidad($cantidad);

        $item->setOrden($orden);

        $itemActualizado = $orden->addItem($item);

            $orden->setEstado('Iniciada');
            $orden->setIniciada(new \DateTime());
            $orden->setUsuario($usuario);

        // Persistir
        $this->em->persist($itemActualizado);
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
}
