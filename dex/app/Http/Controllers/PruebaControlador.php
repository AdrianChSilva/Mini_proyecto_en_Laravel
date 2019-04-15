<?php
namespace PruebApp\Http\Controllers;

use PruebApp\Http\Controllers\Controller;

class PruebaControlador extends Controller
{

    public function prueba($param)
    {
        if ($param === 'pepe') {
            return "Hola Paco " . $param;
        } else {
            return "Lo siento, sólo pepe puede entrar aquí. Adiós " . $param;
        }
    }
}
