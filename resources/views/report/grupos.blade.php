<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de grupos</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
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
        footer{
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px;
            font-size: 12px;
            color: #555;
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
                    <th>Puntaje</th>                                             
                    <th>
                        Categoria del grupo
                    </th>
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
                        <td rowspan="{{ $integranteCount }}">
                        @foreach($grupo->pivotGrupoLinea as $pivot)
                        <p>
                            - {{ $pivot->area_investigacion->name }}
                        </p>
                         @endforeach    
                        </td>
                        <td rowspan="{{ $integranteCount }}">
                        @foreach($grupo->pivotGrupoLinea as $pivot)
                            <p>
                                - {{ $pivot->linea->name }}
                            </p>
                        @endforeach 
                        </td>
                        <td rowspan="{{ $integranteCount }}">
                        @foreach($grupo->pivotGrupoLinea as $pivot)
                            <p>
                                - {{ $pivot->sublinea->name }}
                            </p>
                        @endforeach 
                        </td>
                        <td rowspan="{{ $integranteCount }}">{{ $grupo->name }}</td>
                        @endif    
                        <td>{{ $inte->persona->name }} {{ $inte->persona->first_name }} {{ $inte->persona->last_name }}</td>
                        <td>{{ $inte->condition }}</td>
                        @if($index === 0)
                        <td rowspan="{{ $integranteCount }}">{{ number_format($evalua->ptj_total_grupo,2) }}</td>
                        <td rowspan="{{ $integranteCount }}">{{ $evalua->categorias }}</td>
                        @endif
                    </tr>
                        @endforeach
                    @endforeach
                @endforeach                                     
            </tbody>
        </table>
</body>
<footer>
    <div class="item-footer">
            {{ now()->format('d/m/Y') }}
    </div>
</footer>
</html>


