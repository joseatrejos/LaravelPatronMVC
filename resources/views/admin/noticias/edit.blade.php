@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Actualizar Noticia | Ludens Productions')


@section('breadcrumbs')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <a href="{{ route('noticias.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver a la Lista de Noticias
            </a>
        </div><br /><br /><br />
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Editar noticia: {{ $noticia -> id}}
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('noticias.update', $noticia -> id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>
                                Título
                            </label>

                            <input type="text" name="txtTitulo" class="form-control" value="{{ $noticia -> titulo }}"></input>
                        </div>


                        @if($noticia -> portada)
                            <a href="storage/portadas/{{ noticia -> portada }}" target="_blank">
                                <img src="/storage/portadas/{{ $noticia -> portada}}" style="width: 60px; height:auto;">
                            </a>
                        @else
                            <p>
                                No hay imagen cargada
                            </p>
                        @endif
                        <!--div class="form-group">
                            <label>
                                Imagen de Portada
                            </label>

                            <input type="file" name="imgPortada" class="form-control"></input>
                        </div-->

                        <div class="form-group">
                            <label>
                                Cuerpo
                            </label>

                            <textarea rows="12" name="txtCuerpo" class="form-control">{{ $noticia -> cuerpo }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">
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