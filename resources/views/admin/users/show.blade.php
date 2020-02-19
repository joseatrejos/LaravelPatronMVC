@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', ' Usuario | ' . $user -> name)


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
                    <h1>
                        {{$user->name}}
                    </h1>
                    <br/>
                    
                    <p>
                        {{$user->email}}
                    </p>

                    <p>
                        {{$user->password}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('mainjs')

@endsection
