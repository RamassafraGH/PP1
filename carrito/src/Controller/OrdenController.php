<?php

// src/Controller/OrdenController.php
namespace App\Controller;

use App\Manager\OrdenManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrdenController extends AbstractController
{
    private OrdenManager $ordenManager;

    public function __construct(OrdenManager $ordenManager)
    {
        $this->ordenManager = $ordenManager;
    }

    #[Route("/orden/agregar", name: "agregar_producto", methods: ["POST"])]
    public function agregarProducto(Request $request): Response
    {
        $idProducto = (int) $request->request->get('idProducto');
        $cantidad = (int) $request->request->get('cantidad');
        $usuario = $this->getUser();

        try {
            $this->ordenManager->agregarProducto($idProducto, $cantidad, $usuario);
            $this->addFlash('success', "Se ingresó a la orden, {$cantidad} unidades del producto {$idProducto}");
        } catch (\Exception $e) {
            $this->addFlash('error', "Error al agregar producto: " . $e->getMessage());
        }

        return $this->redirectToRoute('listar_productos');
    }
}
