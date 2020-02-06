@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Administración | Ludens Productions')
@section('subtitulo', 'Lista de Noticias')


@section('breadcrumbs')

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Éxito
                    </h5>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('failure'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Error
                    </h5>
                    {{ Session::get('failure') }}
                </div>
            @endif
            <div class="card">
                <!--div class="card-header">
                    <h3 class="card-title">
                        Lista de noticias
                    </h3>
                </div-->
                <div class="card-body">
                    <a href="{{ route('noticias.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Agregar Noticia
                    </a>
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
                                        {{ $noticia -> titulo }}
                                    </td>

                                    <td>
                                        <!-- Show -->
                                        <a href="{{ route('noticias.show', $noticia -> id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                            
                                        <!-- Edit -->
                                        <a href="{{ route('noticias.edit', $noticia -> id) }}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                            
                                        <!-- Delete -->
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <form method="POST" action="{{route('noticias.destroy', $noticia -> id)}}">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Seguro de que deseas borrar el registro?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                En caso de borrarlo, no habrá manera de recuperarlo.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Discard
                                </button>

                                <button type="button" class="btn btn-primary">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('mainjs')

@endsection
