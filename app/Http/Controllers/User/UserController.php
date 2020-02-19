<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Usuario;

class UserController extends Controller
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
        $users = User::all();
        $argumentos = array();
        $argumentos['users'] = $users;
        return view('admin.users.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user -> name = $request -> input('txtUsername');
        $user -> email = $request -> input('txtEmail');
        $user -> password = $request -> input('txtPassword');
        if($user -> save())
        {
            return redirect() -> route('users.index') -> with('success', 'El usuario fue guardada correctamente');
        }
        // In case the if() doesn't finish the execution of the code with the return, then cookies will be used to validate 
        return redirect() -> route('users.index') -> with('failure', 'El usuario no pudo ser guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find primary key
        $user = User::find($id);
        
        if($user)
        {
            $argumentos = array();
            $argumentos['user'] = $user;
            return view('admin.users.show', $argumentos);
        }
        
        return redirect() -> route('users.index' -> with('failure', 'No se encontró al usuario'));
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
        $user = User::find($id);

        if($user)
        {
            $argumentos = array();
            $argumentos['user'] = $user;
            return view('admin.users.edit', $argumentos);
        }
        
        return redirect() -> route('users.index' -> with('failure', 'No se encontró al usuario'));
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
        $user = User::find($id);
        if($user)
        {
            $user -> name = $request -> input('txtUsername');
            $user -> email = $request -> input('txtEmail');
            $user -> password = $request -> input('txtPassword');

            if($user -> save())
            {
                return redirect() -> route('users.edit', $id) -> with('success', 'El usuario se actualizó exitosamente');
            }
            // If noticia can't be updated
            return redirect() -> route('users.edit', $id) -> with('failure', 'No se pudo actualizar al usuario');
        }
        // If noticia isn't even found
        return redirect() -> route('users.index') -> with('failure', 'No se encontró al usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if($user) {
            if($user -> delete()){
                return redirect() -> route('users.index') -> with('exito', 'Usuario eliminado exitosamente');
            }
            return redirect() -> route('users.index') ->with('failure', 'No se pudo eliminar al usuario');
        }
        return redirect() -> route('users.index') -> with('failure', 'No se encontró al usuario');
    }
}

?>