<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Noticia;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        $argumentos = array();
        $argumentos['noticias'] = $noticias;
        return view('admin.noticias.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noticia = new Noticia();
        $noticia -> titulo = $request -> input('txtTitulo');
        $noticia -> cuerpo = $request -> input('txtCuerpo');
        if($noticia -> save())
        {
            return redirect() -> route('noticias.index') -> with('success', 'La noticia fue guardada correctamente');
        }
        // In case the if() doesn't finish the execution of the code with the return, then cookies will be used to validate 
        return redirect() -> route('noticias.index') -> with('failure', 'La noticia no pudo ser guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find primary key
        $noticia = Noticia::find($id);
        $argumentos = array();
        $argumentos['noticia'] = $noticia;
        return view('admin.noticias.edit', $argumentos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Busca un registro a partir de la llave primaria (SELECT * FROM Noticia)
        $noticia = Noticia::find($id);
        if($noticia)
        {
            $noticia -> titulo = $request -> input('txtTitulo');
            $noticia -> cuerpo = $request -> input('txtCuerpo');
            if($noticia -> save())
            {
                return redirect() -> route('noticias.edit', $id) -> with('exito', 'La noticia se actualizó exitosamente');
            }
            // If noticia can't be updated
            return redirect() -> route('noticias.edit', $id) -> with('error', 'No se pudo actualizar la noticia');
        }
        // If noticia isn't even found
        return redirect() -> route('noticias.index') -> with('error', 'No se encontró la noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
