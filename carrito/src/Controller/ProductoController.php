<?php

namespace App\Controller;

use App\Manager\ProductoManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
