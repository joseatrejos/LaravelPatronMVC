@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Agregar Noticia | Ludens Productions')
@section('subtitulo', 'Nueva Noticia')


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
                    <form method="POST" action="{{ route('noticias.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>
                                Título
                            </label>

                            <input type="text" name="txtTitulo" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <label>
                                Cuerpo
                            </label>
                            
                            <textarea rows="12" name="txtCuerpo" class="form-control"></textarea>
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
