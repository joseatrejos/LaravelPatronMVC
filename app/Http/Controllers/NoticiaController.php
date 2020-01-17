<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;

class NoticiaController extends Controller
{
    public function index() {
        
        // Esta variable $noticia adoptará las variables (en este caso tablas) como objetos de PHP del archivo Noticia.php
        $noticias = Noticia::all();

        /*$noticias = array();
        $argumentos = array();

        $noticias[] =
            ['titulo' => 'Yaquis toman la carretera'];
        $noticias[] =
            ['titulo' => 'Pavimentan todas las calles!'];*/
        
        // La llave $noticias se vuelve una VARIABLE llamada noticias
        $argumentos['noticias'] = $noticias;
        
        return view('noticias.index', $argumentos);
    }
}
