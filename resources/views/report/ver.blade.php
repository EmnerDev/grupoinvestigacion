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
        .tabla{
            margin-top: 15px;
            border-spacing: 10px;
            border-collapse: collapse;  
            width:100%;
            }
        .t-i-tabla-th {
            background: #000;
            color: #fff
        }
        .i-tabla-th{
        background-color:#b3f0ff;
        font-size:14px;
        }
        .i-tabla-td{
        font-size:14px;
}
        .tabla td, .tabla th{
            padding:5px;
            border: 1px solid #AED6F1;
            border-collapse: collapse; 
            width:100%;
            }

        tbody{
            /* background: #f0ffd4;  */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            text-align: center;
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
            <tbody>
                <tr>                    
                    <th class="i-tabla-th">
                        Nombre del Grupo: 
                    </th>
                    <td class="i-tabla-td">{{ $grupos->name }}</td>                    
                </tr>                                             
            </tbody>
        </table>

        <table class="tabla">
            <thead>
                <tr>
                    <th colspan="6" class="i-tabla-th">LINEAS DE INVESTIGACIÓN</th>
                </tr>
                <tr>
                    <th class="i-tabla-th">N°</th>
                    <th class="i-tabla-th">Area</th>
                    <th class="i-tabla-th">Línea</th>
                    <th class="i-tabla-th">Sublinea</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pivotGrupo as $key => $pivot)
                <tr>
                    <td class="i-tabla-td">{{ $key+1 }}</td>
                    <td class="i-tabla-td">{{ $pivot->area_investigacion->name }}</td>
                    <td class="i-tabla-td">{{ $pivot->linea->name }}</td>
                    <td class="i-tabla-td">{{ $pivot->sublinea->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="tabla">
            <thead>
                <tr>
                    <th colspan="6" class="i-tabla-th">INTEGRANTES</th>
                </tr>
                <tr>
                    <th class="i-tabla-th">N°</th>
                    <th class="i-tabla-th">Nombres y Apellidos</th>
                    <th class="i-tabla-th">Condicion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($integrantes as $key => $inte)
                <tr>
                    <td class="i-tabla-td">{{ $key+1 }}</td>
                    <td class="i-tabla-td">{{ $inte->persona->name }} {{ $inte->persona->first_name }} {{ $inte->persona->last_name }}</td>
                    <td class="i-tabla-td">{{ $inte->condition }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @php
                    $lastEvaluacionGrupo = $grupos->evaluacionGrupos->last();
                    
                @endphp
        <table class="tabla">
            <tbody>
                {{-- @foreach($grupos->evaluacionGrupos as $evalua) --}}
                <tr>                    
                    <th class="i-tabla-th">
                        Puntaje 
                    </th>
                    <td class="i-tabla-td">{{ number_format($lastEvaluacionGrupo->ptj_total_grupo,2) }}</td>                    
                </tr>
                <tr>                    
                    <th class="i-tabla-th">
                        Categoria del grupo
                    </th>
                    <td class="i-tabla-td">{{ $lastEvaluacionGrupo->categorias }}</td>                    
                </tr>                                            
                {{-- @endforeach --}}
            </tbody>
        </table>
</body>
<footer>
    <div class="item-footer">
            {{ now()->format('d/m/Y') }}
    </div>
</footer>
</html>