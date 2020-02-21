@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', ' Administración | ' . $noticia -> titulo)


@section('breadcrumbs')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <a href="{{ route('noticias.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver a la Lista de Noticias
            </a>
        </div><br/><br/><br/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Noticia: {{ $noticia -> titulo}}
                    </h3>
                </div>
                <div class="card-body">
                    <h1>
                        {{$noticia->titulo}}
                    </h1>

                    <p>
                        {{$noticia->cuerpo}}
                    </p>

                    <img src="public/portada/{{ $noticia -> portada}}" style="width: 75px; height:auto;"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('mainjs')

@endsection
