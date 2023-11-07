<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de grupos</title>
    <style>
        .tabla {
            /* border: 1px solid #000000; */
            border-collapse: collapse;
        }
        thead {
            background: #000;
            color: #fff
        }

        tbody{
            /* background: #f0ffd4;  */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            text-align: center;
        }
        .tabla td, th {
            border: #000000 1px solid;
            padding: 0.3em;
        }
        .cabecera {
            align-self: center;
        }
    </style>
</head>
<header>
    <table align="center">
        <tr>
            <td rowspan="3" width=10%><img src="{{ public_path('/assets/unheval.png') }}" width="65" height="auto"></td>
            <td rowspan="3" width="700%"><label style="font-family: 'Times New Roman'; font-size:18px;"><b>Universidad Nacional Hermilio Valdizan</b></label><br>
                <span style="font-family: 'Times New Roman'; font-size:17px"><b>Vicerrectorado de Investigación</b></span><br>
                <span style="font-family: 'Times New Roman'; font-size:17px"><b>Dirección de Investigación</b></span></td>
            <td rowspan="3" width=20%><img src="{{ public_path('/assets/LOGO_DI.png') }}" width="65" height="auto"></td>
        </tr>
    </table>
</header>
<body>    
    <div style="text-align: center;margin-top:25px; margin-bottom:25px"><span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:20px;"><b>Grupos de Investigación</b></span> <br></div>
        <table class="tabla">
            <thead>
                <tr>
                    <th>
                        N°
                    </th>
                    <th>
                        Area de Investigacion
                    </th>
                    <th>
                        Linea
                    </th>
                    <th>
                        Sublinea
                    </th>
                    <th>
                        Nombre del grupo
                    </th>                                           
                    <th>
                        Integrantes
                    </th>
                    <th>
                        Condicion
                    </th>
                    <th>
                        Categoria del grupo
                    </th>
                    <th>Puntaje</th>                                             
                </tr>
            </thead>
            <tbody>
                @foreach ($grupos as $key => $grupo)
                    @foreach ($grupo->evaluacionGrupos as $evalua)    
                        @php
                            $integranteCount = $grupo->integrante->count();
                        @endphp                                   
                        @foreach ($grupo->integrante as $index => $inte)
                                    
                    <tr>
                        @if($index === 0)
                        <td rowspan="{{ $integranteCount }}">{{ $key+1 }}</td>
                        <td rowspan="{{ $integranteCount }}">{{ $grupo->area_investigacion->name }}</td>
                        <td rowspan="{{ $integranteCount }}">{{ $grupo->linea->name }}</td>
                        <td rowspan="{{ $integranteCount }}">{{ $grupo->sublinea->name }}</td>
                        <td rowspan="{{ $integranteCount }}">{{ $grupo->name }}</td>
                        @endif    
                        <td>{{ $inte->persona->name }} {{ $inte->persona->first_name }} {{ $inte->persona->last_name }}</td>
                        <td>{{ $inte->condition }}</td>
                        @if($index === 0)
                        <td rowspan="{{ $integranteCount }}">{{ $evalua->categorias }}</td>
                        <td rowspan="{{ $integranteCount }}">{{ number_format($evalua->ptj_total_grupo,2) }}</td>
                        @endif
                    </tr>
                        @endforeach
                    @endforeach
                @endforeach                                     
            </tbody>
        </table>
</body>
</html>


