<?php

namespace App\Twig\Components\MiTabla\Tabla;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use App\Controller\MiTabla\TablaController;
use Symfony\UX\LiveComponent\Attribute\LiveAction;

#[AsLiveComponent(template: 'mi_tabla\tabla\componentes\tabla_component.html.twig')]
class TablaComponent
{
    use DefaultActionTrait;
    
    #[LiveProp]
    public array $listado = [];

    #[LiveProp]
    public array $ajustes = [];

    private TablaController $tablaController;

    public function __construct(TablaController $tablaController) {
        $this->tablaController = $tablaController;
    }

    #[LiveAction]
    public function actualizarDatos(): void
    {
        $this->listado = $this->tablaController->obtenerDatos()['tabla']['listado'];
        $this->ajustes = $this->tablaController->obtenerDatos()['tabla']['ajustes'];
    }
}