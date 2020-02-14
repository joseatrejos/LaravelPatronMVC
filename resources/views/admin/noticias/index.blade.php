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
                                    Cuerpo
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
                                        {{ $noticia -> cuerpo }}
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
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $noticia -> id }})" data-target="#delete-modal" class="btn btn-danger delete-modal-btn">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <form method="POST" id="deleteForm" action="{{route('noticias.destroy', $noticia -> id)}}">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">¿Seguro de que deseas borrar el registro?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Discard
                                </button>

                                <button type="submit" class="btn btn-primary" name="delete_noticia" onclick="formSubmit()">
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
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("noticias.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
        $("#modal-body").innerHTML("En caso de borrar la noticia no habrá manera de recuperarla.")
    }
</script>
@endsection
