<?php

namespace App\Controller\MiTabla;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GeneralController extends AbstractController
{
    #[Route('/', name: 'app_mitabla_redireccion')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_mitabla_tabla');
    }
}
