<?php

namespace App\Controller;

use App\Manager\ProductoManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductoRepository;


class ProductoController extends AbstractController
{
    #[Route('/', name: 'listar_productos')]
    public function listarProducto(ProductoManager $productoManager): Response
    {
        $productos = $productoManager->getProductos();

        return $this->render('producto/lista.html.twig', [
            'productos' => $productos,
        ]);
    }


    #[Route('/producto/{id}', name: 'detalle_producto')]
    public function detalleProducto(ProductoManager $productoManager, int $id): Response
    {
        $producto = $productoManager->getProducto($id);

        return $this->render('producto/detalle.html.twig', [
            'producto' => $producto,
        ]);
    }
}
