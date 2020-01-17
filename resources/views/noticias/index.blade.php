<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            Noticias
        </title>
    </head>

    <body>
        @php
            // var_dump($noticias) 
        @endphp
        <table>
            <caption>
                Noticias <br/><br/>
            </caption>
            <thead>
                <th>
                    Titulo
                </th>
                <th>
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                <tr>
                    <td>
                        {{$noticia->titulo}}
                    </td>

                    <td>
                        <a href="{{route('noticias.show', $noticia -> id)}}">
                            Leer más...
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>