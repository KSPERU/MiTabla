<?php

namespace App\Twig\Components\MiTabla\General;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'mi_tabla/general/componentes/barra_component.html.twig')]
class BarraComponent
{
    public array $contenido = [];
}