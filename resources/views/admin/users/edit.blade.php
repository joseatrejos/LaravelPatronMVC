@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Actualizar Usuario | Ludens Productions')


@section('breadcrumbs')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver a la Lista de Usuarios
            </a>
        </div><br/><br/><br/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Editar usuario: {{ $user -> id}}
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('users.update', $user -> id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>

                            <input type="text" name="txtUsername" class="form-control" value="{{ $user -> name }}"></input>
                        </div>

                        <div class="form-group">
                            <label>
                                Correo
                            </label>
                            
                            <input type="text" name="txtEmail" class="form-control" value="{{ $user -> email }}"></input>
                        </div>

                        <div class="form-group">
                            <label>
                                Contraseña
                            </label>
                            
                            <input type="text" name="txtPassword" class="form-control" value=""></input>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" >
                                Actualizar
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
