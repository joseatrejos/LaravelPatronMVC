@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Agregar Usuario | Ludens Productions')
@section('subtitulo', 'Nuevo Usuario')


@section('breadcrumbs')

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--div class="card-header">
                    <h3 class="card-title">
                        Crear noticia
                    </h3>
                </div-->
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>

                            <input type="text" name="txtUsername" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <label>
                                Correo
                            </label>

                            <input type="text" name="txtEmail" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <label>
                                Contraseña
                            </label>
                            
                            <input type="password" name="txtPassword" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" >
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('mainjs')

@endsection
