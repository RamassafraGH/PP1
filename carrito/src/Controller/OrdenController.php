<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrdenController extends AbstractController
{
     #[Route("/orden/agregar", name:"agregar_producto" )]

    public function agregarProducto(Request $request): Response
    {
        $idProducto = $request->request->get('idProducto');
        $cantidad = $request->request->get('cantidad');

        $this->addFlash('success', "Se ingresó a la orden, {$cantidad} unidades del producto {$idProducto}");

        return $this->redirectToRoute('listar_productos');

    }

    public function agregarItem(Request $request): Response{
        
    }
}
