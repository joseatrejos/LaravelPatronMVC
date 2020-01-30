@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Administración | Titulo')
@section('subtitulo', 'Lista de Noticias')


@section('breadcrumbs')

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--div class="card-header">
                    <h3 class="card-title">
                        Lista de noticias
                    </h3>
                </div-->
                <div class="card-body">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Agregar Noticia
                    </button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Noticia
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($noticias as $noticia)
                                <tr>
                                    <td>
                                        {{$noticia -> titulo}}
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('mainjs')

@endsection
