<?php

namespace App\Controller\MiTabla;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TablaController extends AbstractController
{
    private HttpClientInterface $httpClientInterface;

    public function __construct(HttpClientInterface $httpClientInterface) {
        $this->httpClientInterface = $httpClientInterface;
    }

    #[Route('/tabla', name: 'app_mitabla_tabla')]
    public function index(HttpClientInterface $httpClientInterface): Response
    {
        return $this->render('mi_tabla/tabla/index.html.twig', [
            'contenido' => $this->obtenerDatos()
        ]);
    }

    public function obtenerDatos()
    {
        $url = "https://dummyjson.com/products";
        $respuesta = $this->httpClientInterface->request('GET', $url);
        $productos = $respuesta->toArray();
        return [
            'barra' => [
                'logo' => [
                    'tipo' => 'local',
                    'ubicacion' => 'img/mi_tabla/general/componentes/barra/logo.png',
                    'redireccion' => [
                        'tipo' => 'local',
                        'valor' => 'app_mitabla_redireccion'
                    ]
                ],
                'variable' => [
                    'nombre' => 'Productos'
                ]
            ],
            'tabla' => [
                'listado' => $productos['products'],
                'ajustes' => [
                    'columnas' => [
                        'visible' => [
                            'todo' => false,
                            'seleccionadas' => [
                                ['valor' => 'id', 'nombre' => '#', 'largo' => '4'],
                                'title'
                            ]
                        ]
                    ],
                    'rango' => [
                        'todo' => false,
                        'especificaciones' => [
                            'inicio' => 1,
                            'fin' => 10
                        ]
                    ],
                    'ordenamiento' => [
                        'columna' => 'title',
                        'modo' => 'descendente'
                    ]
                ]
            ]
        ];
    }
}
